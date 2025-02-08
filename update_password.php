<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_information";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(['status' => 'error', 'message' => 'Database connection failed']));
}


if (!isset($_SESSION['email'])) {
    die(json_encode(['status' => 'error', 'message' => 'User not logged in']));
}

$data = json_decode(file_get_contents("php://input"), true);
$email = $_SESSION['email'];
$current_password = $data['current_password'];
$new_password = $data['new_password'];


$stmt = $conn->prepare("SELECT password FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

if (!$user) {
    die(json_encode(['status' => 'error', 'message' => 'User not found']));
}


if ($current_password !== $user['password']) {
    die(json_encode(['status' => 'error', 'message' => 'Current password is incorrect']));
}


$stmt = $conn->prepare("UPDATE users SET password = ? WHERE email = ?");
$stmt->bind_param("ss", $new_password, $email);

if ($stmt->execute()) {
    echo json_encode(['status' => 'success', 'message' => 'Password updated successfully']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Password update failed']);
}

$stmt->close();
$conn->close();
?>
