<?php
header('Content-Type: application/json');
include 'db.php';

if (!$conn) {
    echo json_encode(["error" => "Database connection failed"]);
    exit();
}

// 查询所有孩子的名字
$sql = "SELECT name FROM childreninfo";
$result = $conn->query($sql);

$childrenNames = [];

while ($row = $result->fetch_assoc()) {
    $childrenNames[] = $row['name'];
}

// 返回 JSON 数据
echo json_encode($childrenNames, JSON_PRETTY_PRINT);

// 关闭数据库连接
$conn->close();
?>
