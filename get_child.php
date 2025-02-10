<?php
header('Content-Type: application/json');
include 'db.php';

if (!$conn) {
    echo json_encode(["error" => "Database connection failed"]);
    exit();
}

// 获取请求参数
$email = isset($_GET['email']) ? $_GET['email'] : null; 
$childId = isset($_GET['id']) ? intval($_GET['id']) : null; 

if (!$email) {
    echo json_encode(["error" => "Missing email"]);
    exit();
}

// 如果提供了 id，就查询该用户的特定孩子，否则查询该用户的所有孩子
if ($childId) {
    $sql = "SELECT * FROM childreninfo WHERE id = ? AND email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $childId, $email);
} else {
    $sql = "SELECT * FROM childreninfo WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
}

$stmt->execute();
$result = $stmt->get_result();

$children = [];
while ($row = $result->fetch_assoc()) {
    $children[] = $row;
}

// 返回 JSON 数据
if (!empty($children)) {
    echo json_encode($children, JSON_PRETTY_PRINT);
} else {
    echo json_encode(["error" => "No children found for this user"]);
}

// 关闭数据库连接
$stmt->close();
$conn->close();
?>
