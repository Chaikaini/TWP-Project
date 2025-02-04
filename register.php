<?php
// 数据库连接配置
$servername = "localhost";
$username = "root";  // MySQL 用户名
$password = "";      // MySQL 密码
$dbname = "user_information"; // 数据库名称

// 创建数据库连接
$conn = new mysqli($servername, $username, $password, $dbname);

// 检查连接
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 处理表单数据
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    // 检查密码是否匹配
    if ($password !== $confirm_password) {
        echo "Passwords do not match!";
        exit();
    }

    // 密码加密
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // 插入用户数据到数据库
    $sql = "INSERT INTO users (username, email, address, phone_number, gender, password) 
            VALUES ('$username', '$email', '$address', '$phone_number', '$gender', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        // 可以重定向到登录页面
        header("Location: login.html");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // 关闭数据库连接
    $conn->close();
}
?>
