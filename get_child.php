<?php
header('Content-Type: application/json');
include 'db.php';

if (!$conn) {
    echo json_encode(["error" => "Database cannot connect"]);
    exit();
}

// 获取请求中的参数（例如传递的孩子 id）
$childId = isset($_GET['id']) ? $_GET['id'] : null; // 获取查询参数 'id'

// 如果没有提供 id，默认返回 id=2 的孩子数据
if ($childId === null) {
    $childId = 2;
}

// 使用指定的 id 来查询孩子信息
$sql = "SELECT * FROM childreninfo WHERE id = " . intval($childId);
$result = $conn->query($sql);

$children = [];

if ($result->num_rows > 0) {
    $children = $result->fetch_assoc();
}

echo json_encode($children, JSON_PRETTY_PRINT);
?>
