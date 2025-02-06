<?php
$servername = "localhost"; 
$username = "root"; 
$password = "";  // 如果你的 MySQL 没有密码，就留空
$dbname = "subject"; // 确保这里写的是 `tuition`

// 创建数据库连接
$conn = new mysqli($servername, $username, $password, $dbname);

// 检查连接是否成功
if ($conn->connect_error) {
    die("数据库连接失败: " . $conn->connect_error);
}
?>
