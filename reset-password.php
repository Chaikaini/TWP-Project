<?php
header("Content-Type: application/json");

$conn = new mysqli("localhost", "root", "", "user_information");
if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Database connection failed."]));
}

if (!isset($_GET["token"])) {
    die(json_encode(["status" => "error", "message" => "No token provided."]));
}

$token = $conn->real_escape_string($_GET["token"]);
$result = $conn->query("SELECT email FROM password_resets WHERE token='$token' AND expires_at > NOW()");

if ($result->num_rows == 0) {
    die(json_encode(["status" => "error", "message" => "Invalid or expired token."]));
}

$row = $result->fetch_assoc();
$email = $row["email"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_password = password_hash($_POST["password"], PASSWORD_BCRYPT);

    if ($conn->query("UPDATE users SET password='$new_password' WHERE email='$email'")) {
        $conn->query("DELETE FROM password_resets WHERE email='$email'");
        echo json_encode(["status" => "success", "message" => "Password has been reset successfully!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Failed to reset password. Please try again."]);
    }
}
?>
