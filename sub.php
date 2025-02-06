<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tuition_centre";

// 创建数据库连接
$conn = new mysqli($servername, $username, $password, $dbname);

// 检查连接
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 获取 year 参数（默认为 Year 1）
$year = isset($_GET['year']) ? $_GET['year'] : 1;

// 查询 subjects 表
$sql = "SELECT name, image, teacher, price, rating, page FROM subjects WHERE year = $year";
$result = $conn->query($sql);

$subjects = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $subjects[] = $row;
    }
}
$conn->close();

// 输出 JSON
echo json_encode($subjects);
?>
