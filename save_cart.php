<?php
// 启动会话，确保你有一个有效的数据库连接
session_start();
include('db_connection.php'); // 包含数据库连接

// 获取 JSON 数据
$data = json_decode(file_get_contents('php://input'), true);

// 获取 cartItem
$cartItem = $data['cartItem'];

// 检查数据是否有效
if (!$cartItem || !isset($cartItem['subject'], $cartItem['price'], $cartItem['child'])) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid cart item data']);
    exit;
}

// 提取数据
$subject = $cartItem['subject'];
$price = $cartItem['price'];
$child = $cartItem['child'];

// 插入数据到数据库
$conn = dbConnect(); // 假设 dbConnect 是你的数据库连接函数

// 插入 SQL 查询
$sql = "INSERT INTO cart_items (subject, price, child) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sds", $subject, $price, $child); // 绑定参数

if ($stmt->execute()) {
    echo json_encode(['status' => 'success', 'message' => 'Item added to cart']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to add item to cart']);
}

$stmt->close();
$conn->close();
?>
