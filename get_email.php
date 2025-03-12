<?php
$servername = "127.0.0.1";  // 数据库服务器地址
$username = "root";         // 数据库用户名
$password = "";             // 数据库密码（假设为空）
$dbname = "user_information";  // 数据库名称

// 创建数据库连接
$conn = new mysqli($servername, $username, $password, $dbname);

// 检查连接是否成功
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
