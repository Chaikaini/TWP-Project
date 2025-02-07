<?php
session_start();
header('Content-Type: application/json');
include 'db_connection.php';

// 确保用户已登录
if (!isset($_SESSION['email'])) {
    echo json_encode(["error" => "用户未登录"]);
    exit();
}

$email = $_SESSION['email']; // 获取当前登录用户的邮箱

// 只查询当前用户的孩子
$sql = "SELECT * FROM childreninfo WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

$children = [];
while ($row = $result->fetch_assoc()) {
    $children[] = $row;
}

echo json_encode($children);
?>
