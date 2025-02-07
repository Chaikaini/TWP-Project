<?php
header('Content-Type: application/json'); // 确保返回 JSON
include 'db_connect.php'; // 确保数据库连接文件存在

if (!$conn) {
    echo json_encode(["error" => "Database cannot connect"]);
    exit();
}

// 只获取 id 为 2 的孩子的信息
$sql = "SELECT * FROM childreninfo WHERE id = 2"; // 通过 id 筛选
$result = $conn->query($sql);

$children = [];

if ($result->num_rows > 0) {
    // 只有一个孩子符合条件，所以直接获取第一个孩子
    $children = $result->fetch_assoc();
}

echo json_encode($children, JSON_PRETTY_PRINT); // 返回 JSON
?>
