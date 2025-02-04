<?php
$conn = new mysqli("localhost", "root", "", "user_information"); // 修正数据库名
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $conn->real_escape_string($_POST["email"]);

    $result = $conn->query("SELECT * FROM users WHERE email='$email'");

    if ($result->num_rows > 0) {
        $token = bin2hex(random_bytes(32));
        $expires_at = date("Y-m-d H:i:s", strtotime("+10 minutes"));

        $conn->query("DELETE FROM password_resets WHERE email='$email'");
        $conn->query("INSERT INTO password_resets (email, token, expires_at) VALUES ('$email', '$token', '$expires_at')");

        $reset_link = "http://localhost/reset-password.php?token=$token";

        // 发送成功
        header("Location: forgot-password.html?success=Reset link sent! Check your email.");
        exit;
    } else {
        // 邮箱未找到
        header("Location: forgot-password.html?error=Email not found!");
        exit;
    }
}
?>
