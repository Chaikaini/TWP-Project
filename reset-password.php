<?php
header("Content-Type: application/json"); // 确保返回 JSON

$conn = new mysqli("localhost", "root", "", "user_information");
if ($conn->connect_error) {
    echo json_encode(["status" => "error", "message" => "Database connection failed."]);
    exit;
}

if (!isset($_GET["token"])) {
    echo json_encode(["status" => "error", "message" => "No token provided."]);
    exit;
}

$token = $conn->real_escape_string($_GET["token"]);
$result = $conn->query("SELECT email FROM password_resets WHERE token='$token' AND expires_at > NOW()");

if ($result->num_rows == 0) {
    echo json_encode(["status" => "error", "message" => "Invalid or expired token."]);
    exit;
}

$row = $result->fetch_assoc();
$email = $row["email"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST["password"]) || empty($_POST["password"])) {
        echo json_encode(["status" => "error", "message" => "Password is required."]);
        exit;
    }

    $new_password = password_hash($_POST["password"], PASSWORD_BCRYPT);
    $conn->query("UPDATE users SET password='$new_password' WHERE email='$email'");
    $conn->query("DELETE FROM password_resets WHERE email='$email'");

    echo json_encode(["status" => "success", "message" => "Password reset successful! Redirecting..."]);
    exit;
}
?>
