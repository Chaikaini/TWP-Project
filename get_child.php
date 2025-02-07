<?php
header('Content-Type: application/json'); // 确保返回 JSON
include 'db_connection.php'; // 确保数据库连接文件存在

if (!$conn) {
    echo json_encode(["error" => "数据库连接失败"]);
    exit();
}

$sql = "SELECT * FROM childreninfo"; // 选择表
$result = $conn->query($sql);

$children = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $children[] = $row;
    }
}

echo json_encode($children, JSON_PRETTY_PRINT); // 返回 JSON
?>
