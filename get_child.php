<?php
header('Content-Type: application/json');
include 'db.php';

// 获取当前用户的 email
$email = isset($_GET['email']) ? $_GET['email'] : '';  // 获取 email 参数

// 如果没有提供 email，返回错误
if (empty($email)) {
    echo json_encode(["error" => "Email is required"]);
    exit();
}

// 查询该用户的孩子名字（假设 `childreninfo` 表中有 `email` 和 `name` 字段）
$sql = "SELECT name FROM childreninfo WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);  // 绑定 email 参数
$stmt->execute();
$result = $stmt->get_result();

$childrenNames = [];

while ($row = $result->fetch_assoc()) {
    $childrenNames[] = $row['name'];  // 获取孩子的名字
}

// 返回 JSON 数据
echo json_encode($childrenNames, JSON_PRETTY_PRINT);

// 关闭数据库连接
$stmt->close();
$conn->close();
?>
