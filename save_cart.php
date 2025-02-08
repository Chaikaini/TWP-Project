<?php
session_start();
include('db_connection.php'); // 确保连接数据库

header('Content-Type: application/json');

$conn = dbConnect();

// 获取前端传过来的 JSON 数据
$data = json_decode(file_get_contents('php://input'), true);
$cart = $data['cart'] ?? [];

if (!empty($cart)) {
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
