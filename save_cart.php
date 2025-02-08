<?php
session_start();
include('db_connect.php'); // 确保数据库连接

header('Content-Type: application/json'); 
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = dbConnect();

// 读取 JSON 数据
$json = file_get_contents('php://input');
$data = json_decode($json, true);

// 调试输出 JSON
if (!$data) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid JSON input', 'raw' => $json]);
    exit;
}

$subject = $data['subject'] ?? '';
$price = $data['price'] ?? 0;
$child = $data['child'] ?? '';

if (!empty($subject) && $price > 0 && !empty($child)) {
    $stmt = $conn->prepare("INSERT INTO cart_items (subject, price, child) VALUES (?, ?, ?)");
    $stmt->bind_param("sds", $subject, $price, $child);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to save cart item']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid cart data', 'received' => $data]);
}

$conn->close();
?>

