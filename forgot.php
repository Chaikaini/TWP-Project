<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Forgot Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="The Seeds Learning Centre,forgot password">
    <meta name="description" content="The Seeds Learning Centre | Forgot Password">

    <link href="img/the-seeds.jpg" rel="icon" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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

        .forgot-password-form h2 {
            font-size: 26px;
            margin-bottom: 15px;
        }

        .forgot-password-form p {
            margin-bottom: 20px;
            font-size: 14px;
            color: #555;
        }

        .forgot-password-form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        .forgot-password-form button {
            width: 100%;
            padding: 10px;
            background-color: #17a2b8;
            border: none;
            border-radius: 5px;
            color: #ffffff;
            font-size: 16px;
            cursor: pointer;
        }

        .forgot-password-form button:hover {
            background-color: #138496;
        }

        .error {
            color: red;
            font-size: 14px;
        }

        .success {
            color: green;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="forgot-password-form">
            <h2>Forgot Password</h2>
            <p>Enter your email to receive a password reset link.</p>
            
            <?php if (isset($_GET['error'])): ?>
                <p class="error"><?php echo htmlspecialchars($_GET['error']); ?></p>
            <?php endif; ?>

            <?php if (isset($_GET['success'])): ?>
                <p class="success"><?php echo htmlspecialchars($_GET['success']); ?></p>
            <?php endif; ?>

            <form action="send-reset-link.php" method="POST" novalidate>
                <input type="email" name="email" placeholder="Enter your email" required autocomplete="email">
                <button type="submit">Send Reset Link</button>
            </form>            
            <p>Remember your password? <a href="login.html">Login here</a></p>
        </div>
    </div>
</body>
</html>
