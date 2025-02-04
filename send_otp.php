<?php
session_start();
header("Content-Type: application/json");

$email = $_POST["email"];
$otp = rand(100000, 999999);
$_SESSION["otp"] = $otp;
$_SESSION["otp_email"] = $email;

// 用 mail() 发送 OTP（请替换成你的邮件服务）
mail($email, "Your OTP Code", "Your OTP is: $otp");

echo json_encode(["success" => true]);
?>
