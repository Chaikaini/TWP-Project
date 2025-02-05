<?php
session_start();
include 'db_connect.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['name'] = $user['name'];

            header("Location: login.php");
            exit();
        } else {
            $error = "Invalid username or password";
        }
    } else {
        $error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            flex-direction: column;
        }
        .login-container, .dashboard {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        .login-container input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .login-container button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .login-container button:hover {
            background-color: #45a049;
        }
        .error-message {
            color: red;
            text-align: center;
        }
        .dashboard {
            margin-top: 20px;
        }
        .logout-btn {
            background-color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <?php if (!isset($_SESSION['user_id'])): ?>
        
        <div class="login-container">
            <h2>Admin Login</h2>
            <form action="login.php" method="POST">
                <input type="text" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Login</button>
            </form>
            <?php if (isset($error)): ?>
                <div class="error-message"><p><?php echo $error; ?></p></div>
            <?php endif; ?>
        </div>
    <?php else: ?>
        
        <div class="dashboard">
            <h2>Welcome, <?php echo $_SESSION['name']; ?>!</h2>
            <p>You are logged in as <strong><?php echo $_SESSION['role']; ?></strong></p>
            
            <?php if ($_SESSION['role'] == 'super_admin'): ?>
                <h3>Super Admin Panel</h3>
                <ul>
                    <li><a href="#">User Management</a></li>
                    <li><a href="#">System Settings</a></li>
                    <li><a href="#">Admin Logs</a></li>
                </ul>
            <?php else: ?>
                <h3>Admin Panel</h3>
                <ul>
                    <li><a href="#">View Reports</a></li>
                    <li><a href="#">Manage Tasks</a></li>
                </ul>
            <?php endif; ?>

            <form action="logout.php" method="POST">
                <button class="logout-btn" type="submit">Logout</button>
            </form>
        </div>
    <?php endif; ?>

</body>
</html>
