<?php

$conn = new mysqli("localhost", "root", "", "user_information");
if ($conn->connect_error) {
    die("Database connection failed.");
}

if (isset($_GET["token"])) {
    $token = $conn->real_escape_string($_GET["token"]);
    $result = $conn->query("SELECT email FROM password_resets WHERE token='$token' AND expires_at > NOW()");

    if ($result->num_rows == 0) {
        echo "Invalid or expired token.";
        exit;
    }

    $row = $result->fetch_assoc();
    $email = $row["email"];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $new_password = password_hash($_POST["password"], PASSWORD_BCRYPT);
        $conn->query("UPDATE users SET password='$new_password' WHERE email='$email'");
        $conn->query("DELETE FROM password_resets WHERE email='$email'");

        echo "Password reset successful! <a href='login.html'>Login here</a>";
        exit;
    }
}
?>
