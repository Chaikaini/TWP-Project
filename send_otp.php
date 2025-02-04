<?php
session_start();
header("Content-Type: application/json");

$email = $_POST["email"];
$otp = rand(100000, 999999);
$_SESSION["otp"] = $otp;
$_SESSION["otp_email"] = $email;


mail($email, "Your OTP Code", "Your OTP is: $otp");

echo json_encode(["success" => true]);
?>
