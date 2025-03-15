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

// check is user login
if (!isset($_SESSION['email'])) {
    echo json_encode(['status' => 'error', 'message' => 'User not logged in']);
    exit;
}

$data = json_decode(file_get_contents("php://input"), true);
$email = $_SESSION['email'];

// get form data
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
    // if want to update password need to check current password is corect 
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

        // get the hide password
        $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

        // update password
        $stmt = $conn->prepare("UPDATE users SET password = ? WHERE email = ?");
        $stmt->bind_param("ss", $hashed_password, $email);
        if (!$stmt->execute()) {
            throw new Exception('Failed to update password');
        }
        $stmt->close();
    }

    // update user information
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

    // sumit
    $conn->commit();
    echo json_encode(['status' => 'success', 'message' => 'Profile updated successfully']);

} catch (Exception $e) {
    $conn->rollback();
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}

$conn->close();
?>
