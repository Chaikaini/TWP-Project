<?php
$servername = "localhost";
$username = "root"; // 数据库用户名
$password = ""; // 数据库密码
$dbname = "tuition_centre"; // 数据库名称

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("database connection fail: " . $conn->connect_error);
}

function dbConnect() {
    $conn = new mysqli("localhost", "root", "", "tuition_centre");

    if ($conn->connect_error) {
        die(json_encode(['status' => 'error', 'message' => 'Database connection failed']));
    }

    return $conn;
}
?>
