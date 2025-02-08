<?php
session_start();
include('db_connect.php'); // 确保连接数据库

header('Content-Type: application/json'); 
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = dbConnect();

// 读取 JSON 数据
$json = file_get_contents('php://input');

// 调试：打印 `php://input` 数据
if (empty($json)) {
    echo json_encode(['status' => 'error', 'message' => 'No data received', 'raw' => $json]);
    exit;
}

$data = json_decode($json, true);

// 调试：打印解析后的 JSON
if (!$data) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid JSON input', 'raw' => $json]);
    exit;
}

$cart = $data['cart'] ?? [];

// 清空原来的购物车，并插入新的购物车数据
if (!empty($cart)) {
    // 删除现有购物车中的所有项目
    $conn->query("DELETE FROM cart_items");

    // 重新插入更新后的购物车数据
    foreach ($cart as $item) {
        $subject = $item['subject'] ?? '';
        $price = $item['price'] ?? 0;
        $child = $item['child'] ?? '';

        if ($subject && $price > 0 && $child) {
            $stmt = $conn->prepare("INSERT INTO cart_items (subject, price, child) VALUES (?, ?, ?)");
            $stmt->bind_param("sds", $subject, $price, $child);

            if (!$stmt->execute()) {
                echo json_encode(['status' => 'error', 'message' => 'Failed to save cart item']);
                exit;
            }
        }
    }
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid cart data']);
}

$conn->close();
?>
