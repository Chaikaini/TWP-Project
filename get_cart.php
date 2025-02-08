<?php
include('db_connect.php'); // 确保连接数据库
header('Content-Type: application/json');

$conn = dbConnect();

// 查询数据库中的购物车数据
$sql = "SELECT * FROM cart_items";
$result = $conn->query($sql);

$data = json_decode(file_get_contents('php://input'), true);

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
    echo json_encode(['status' => 'error', 'message' => 'Invalid cart data']);
}

// 关闭数据库连接
$conn->close();

// 返回 JSON 数据
echo json_encode(['status' => 'success', 'cart' => $cart]);
?>
