<?php

date_default_timezone_set('Asia/Malaysia'); 

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

        $reset_link = "http://localhost/TWP-Project/reset-password.php?token=$token";

        echo "<p>Click the link to reset your password: <a href='$reset_link'>Reset Password</a></p>";
    } else {
        echo "<p>Email not found!</p>";
    }
}
?>

<form method="POST">
    <input type="email" name="email" required placeholder="Enter your email">
    <button type="submit">Send Reset Link</button>
</form>
