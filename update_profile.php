<?php
session_start();
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_information";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode(['status' => 'error', 'message' => 'Database connection failed']);
    exit;
}

// 检查用户是否已登录
if (!isset($_SESSION['email'])) {
    echo json_encode(['status' => 'error', 'message' => 'User not logged in']);
    exit;
}

$data = json_decode(file_get_contents("php://input"), true);
$email = $_SESSION['email'];

// 获取表单数据
$username = $data['username'];
$gender = $data['gender'];
$ic_num = $data['ic_num'];
$phone_num_1 = $data['phone_num_1'];
$phone_num_2 = $data['phone_num_2'];
$relationship = $data['relationship'];
$address = $data['address'];
$current_password = $data['current_password'] ?? '';
$new_password = $data['new_password'] ?? '';

$conn->begin_transaction();

try {
    // 如果需要更新密码，先检查当前密码是否正确
    if (!empty($current_password) && !empty($new_password)) {
        $stmt = $conn->prepare("SELECT password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();

        if (!$user) {
            throw new Exception('User not found');
        }

        if (!password_verify($current_password, $user['password'])) {
            throw new Exception('Current password is incorrect');
        }

        // 生成新密码哈希值
        $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

        // 更新密码
        $stmt = $conn->prepare("UPDATE users SET password = ? WHERE email = ?");
        $stmt->bind_param("ss", $hashed_password, $email);
        if (!$stmt->execute()) {
            throw new Exception('Failed to update password');
        }
        $stmt->close();
    }

    // 更新用户信息
    $stmt = $conn->prepare("
    UPDATE users 
    SET username=?, gender=?, ic_number=?, phone_number=?, phone_number2=?, relationship=?, address=? 
    WHERE email=?
");
$stmt->bind_param("ssssssss", $username, $gender, $ic_num, $phone_num_1, $phone_num_2, $relationship, $address, $email);

    
    if (!$stmt->execute()) {
        throw new Exception('Profile update failed');
    }
    $stmt->close();

    // 提交事务
    $conn->commit();
    echo json_encode(['status' => 'success', 'message' => 'Profile updated successfully']);

} catch (Exception $e) {
    $conn->rollback();
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}

$conn->close();
?>
