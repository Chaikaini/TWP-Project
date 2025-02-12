<?php
header('Content-Type: application/json'); // 设置 JSON 头部
include 'db_connect.php'; // 连接数据库

$year = isset($_GET['year']) ? $_GET['year'] : 'Year 3'; // 获取参数，默认为 Year 1

$sql = "SELECT name, image, teacher, price, rating, page FROM subjects WHERE TRIM(LOWER(year)) = LOWER(TRIM(?))";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $year);
$stmt->execute();
$result = $stmt->get_result();

$subjects = [];
while ($row = $result->fetch_assoc()) {
    $subjects[] = $row;
}

echo json_encode($subjects);
?>
