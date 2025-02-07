<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tuition_centre"; // 这里改成 profile 数据库

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("database connection fail: " . $conn->connect_error);
}
?>
