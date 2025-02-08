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

if (!isset($_SESSION['email'])) {
    echo json_encode(['status' => 'error', 'message' => 'User not logged in']);
    exit;
}

$data = json_decode(file_get_contents("php://input"), true);
$email = $_SESSION['email'];
$current_password = $data['current_password'];
$new_password = $data['new_password'];

if (!$current_password || !$new_password) {
    echo json_encode(['status' => 'error', 'message' => 'All fields are required']);
    exit;
}

// 查询数据库获取当前用户的密码
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

// 生成新的加密密码
$hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

// 更新密码
$stmt = $conn->prepare("UPDATE users SET password = ? WHERE email = ?");
$stmt->bind_param("ss", $hashed_password, $email);

if ($stmt->execute()) {
    echo json_encode(['status' => 'success', 'message' => 'Password updated successfully']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Password update failed']);
}

$stmt->close();
$conn->close();
?>
