<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Popup</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <button id="loginBtn">Login</button>

    <!-- Popup -->
    <div id="loginPopup" class="popup hidden">
        <div class="popup-content">
            <span class="close-btn" id="closePopup">&times;</span>
            <h2>登录</h2>
            <form>
                <label for="username">用户名:</label>
                <input type="text" id="username" name="username" required>

                <label for="password">密码:</label>
                <input type="password" id="password" name="password" required>

                <button type="submit">登录</button>
            </form>
            <div class="links">
                <a href="#" id="register">注册</a> | 
                <a href="#" id="forgotPassword">忘记密码</a>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
