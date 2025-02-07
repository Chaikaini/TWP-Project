<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);


session_start(); // 启动会话

// 获取客户端发送的 JSON 数据
$cart = json_decode(file_get_contents('php://input'), true)['cart'];

if (!$cart) {
    error_log("No cart data received!");
    echo json_encode(['status' => 'error', 'message' => 'No cart data']);
    exit;
}

error_log("Cart data received: " . print_r($cart, true));

// 连接到数据库（假设已经创建了数据库连接函数）
$conn = new mysqli("localhost", "username", "password", "database_name");

$sql = "INSERT INTO cart_items (subject, price, child) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    error_log('SQL error: ' . $conn->error);
    echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $conn->error]);
    exit;
}

$stmt->bind_param("sds", $subject, $price, $child);

if (!$stmt->execute()) {
    error_log('Execution error: ' . $stmt->error);
    echo json_encode(['status' => 'error', 'message' => 'Failed to save cart item: ' . $stmt->error]);
    exit;
}

// 检查连接
if ($conn->connect_error) {
    echo json_encode(['status' => 'error', 'message' => 'Database connection failed: ' . $conn->connect_error]);
    exit;
}

// 将购物车数据插入数据库
foreach ($cart as $item) {
    $subject = $conn->real_escape_string($item['subject']);
    $price = $item['price'];
    $child = $conn->real_escape_string($item['child']);

    $sql = "INSERT INTO cart_items (subject, price, child) VALUES ('$subject', '$price', '$child')";

    if (!$conn->query($sql)) {
        echo json_encode(['status' => 'error', 'message' => 'Failed to save item: ' . $conn->error]);
        exit;
    }
}

// 关闭数据库连接
$conn->close();

// 返回成功响应
echo json_encode(['status' => 'success', 'message' => 'Cart items saved successfully']);
?>
