<?php
session_start();
require_once 'config.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if (empty($email) || empty($password)) {
        $error = "Please enter email and password!";
    } else {
        
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if ($conn->connect_error) {
            die("Connection failed：" . $conn->connect_error);
        }

        $stmt = $conn->prepare("SELECT id, name, email, password, role FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user["password"])) {
                $_SESSION["admin_id"] = $user["id"];
                $_SESSION["admin_name"] = $user["name"];
                $_SESSION["admin_role"] = $user["role"];

                header("Location: admin_dashboard.php");
                exit();
            } else {
                $error = "Wrong password!";
            }
        } else {
            $error = "The email does not exist or does not have administrator rights!";
        }
        
        $stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator login</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; }
        .login-container { width: 300px; margin: 100px auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px; }
        .input-field { width: 100%; padding: 10px; margin: 10px 0; }
        .btn { width: 100%; padding: 10px; background: blue; color: white; border: none; cursor: pointer; }
        .error { color: red; }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Administrator login</h2>
    
    <?php if (!empty($error)) { echo '<p class="error">'.$error.'</p>'; } ?>

    <form action="admin_login.php" method="post">
        <input type="email" name="email" class="input-field" placeholder="管理员邮箱" required>
        <input type="password" name="password" class="input-field" placeholder="密码" required>
        <button type="submit" class="btn">Login</button>
    </form>
</div>

</body>
</html>
