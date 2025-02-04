<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Reset Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Heebo', sans-serif;
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
            background-color: #f4f4f4;
        }
        .container {
            width: 100%;
            max-width: 400px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h2 {
            font-size: 26px;
            margin-bottom: 15px;
        }
        p {
            font-size: 14px;
            color: #555;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #17a2b8;
            border: none;
            border-radius: 5px;
            color: #ffffff;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #138496;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Reset Password</h2>
        <p>Enter your new password below.</p>
        <form method="POST">
            <input type="password" name="password" required placeholder="Enter new password">
            <button type="submit">Reset Password</button>
        </form>
    </div>
</body>
</html>

<?php

date_default_timezone_set('Asia/Kuala_Lumpur');
echo "Current PHP time: " . date("Y-m-d H:i:s") . "<br>";


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
