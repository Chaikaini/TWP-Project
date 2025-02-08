<?php
$servername = "127.0.0.1";
$username = "root";  // 使用你自己的数据库用户名
$password = "";      // 使用你自己的数据库密码
$dbname = "profile"; // 使用你的数据库名称

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);

// 检查连接
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
