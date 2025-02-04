<?php

date_default_timezone_set('Asia/Kuala_Lumpur');

$conn = new mysqli("localhost", "root", "", "user_information");
if ($conn->connect_error) {
    die("Database connection failed.");
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

        echo "A reset link has been sent to your email: <br><a href='$reset_link'>Reset Password</a>";
    } else {
        echo "Email not found!";
    }
}
?>
