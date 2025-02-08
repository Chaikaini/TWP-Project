<?php
session_start();
include('db_connect.php'); // 确保连接数据库

header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1); // 显示所有错误

$conn = dbConnect();

// 获取请求体中的原始 JSON 数据
$json = file_get_contents('php://input');

// 调试：检查是否有数据接收到
if (empty($json)) {
    echo json_encode(['status' => 'error', 'message' => 'No data received', 'raw' => $json]);
    exit;
}

// 解析 JSON 数据
$data = json_decode($json, true);

// 调试：检查解析后的数据
if (!$data) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid JSON input', 'raw' => $json]);
    exit;
}

$cart = $data['cart'] ?? [];

// 如果购物车数据有效
if (!empty($cart)) {
    foreach ($cart as $item)$subject = $item['subject'] ?? '';
    $price = $item['price'] ?? 0;
    $child = $item['child'] ?? '';
    $image = $item['image'] ?? ''; // 获取图片路径
    
    // 插入数据到数据库
    $stmt = $conn->prepare("INSERT INTO cart_items (subject, price, child, image) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sdss", $subject, $price, $child, $image);
    
    if (!$stmt->execute()) {
        echo json_encode(['status' => 'error', 'message' => 'Failed to save cart item']);
        exit;
    }
    
$conn->close();
?>
