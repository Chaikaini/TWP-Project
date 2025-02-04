<?php
session_start();
header("Content-Type: application/json");

$email = $_POST["email"];
$otp = $_POST["otp"];

if ($_SESSION["otp_email"] === $email && $_SESSION["otp"] == $otp) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "error" => "Invalid OTP"]);
}
?>
