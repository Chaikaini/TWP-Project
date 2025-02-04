<?php
session_start();
require 'PHPMailer/PHPMailerAutoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "invalid_email";
        exit();
    }

    // 生成 6 位随机 OTP
    $otp = rand(100000, 999999);
    $_SESSION['otp'] = $otp;
    $_SESSION['otp_expiry'] = time() + 300; // OTP 有效期 5 分钟
    $_SESSION['otp_email'] = $email;

    // 配置 PHPMailer
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp.example.com'; // 你的 SMTP 服务器
    $mail->SMTPAuth = true;
    $mail->Username = 'your-email@example.com'; // 你的邮箱
    $mail->Password = 'your-email-password'; // 你的邮箱密码
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('your-email@example.com', 'The Seeds Learning Centre');
    $mail->addAddress($email);
    $mail->Subject = 'Your OTP Code';
    $mail->Body = "Your OTP code is: $otp\nThis code is valid for 5 minutes.";

    if ($mail->send()) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "error";
}
?>
