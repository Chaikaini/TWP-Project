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
$name = $data['name'];
$gender = $data['gender'];
$ic_num = $data['ic_num'];
$phone_num_1 = $data['phone_num_1'];
$phone_num_2 = $data['phone_num_2'];
$relationship = $data['relationship'];
$address = $data['address'];
$current_password = $data['current_password'] ?? '';
$new_password = $data['new_password'] ?? '';

// 检查是否需要更新密码
if (!empty($current_password) && !empty($new_password)) {
    // 获取当前密码的哈希值
    $stmt = $conn->prepare("SELECT password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();

    if (!$user) {
        echo json_encode(['status' => 'error', 'message' => 'User not found']);
        exit;
    }

    // 验证当前密码
    if (!password_verify($current_password, $user['password'])) {
        echo json_encode(['status' => 'error', 'message' => 'Current password is incorrect']);
        exit;
    }

    // 生成新密码的哈希值
    $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

    // 更新数据库中的密码
    $stmt = $conn->prepare("UPDATE users SET password = ? WHERE email = ?");
    $stmt->bind_param("ss", $hashed_password, $email);
    $stmt->execute();
    $stmt->close();
}

// 更新用户的个人信息
$stmt = $conn->prepare("
    UPDATE users 
    SET name=?, gender=?, ic_number=?, phone_number=?, phone_number2=?, relationship=?, address=? 
    WHERE email=?
");
$stmt->bind_param("ssssssss", $name, $gender, $ic_num, $phone_num_1, $phone_num_2, $relationship, $address, $email);

if ($stmt->execute()) {
    echo json_encode(['status' => 'success', 'message' => 'Profile updated successfully']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Profile update failed']);
}

$stmt->close();
$conn->close();
?>
