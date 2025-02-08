<?php
include('db_connect.php'); // 确保连接数据库
header('Content-Type: application/json');

$conn = dbConnect();

// 查询数据库中的购物车数据
$sql = "SELECT * FROM cart_items";
$result = $conn->query($sql);

$cart = []; // 确保 $cart 定义了
while ($row = $result->fetch_assoc()) {
    $cart[] = $row;
}

// 关闭数据库连接
$conn->close();

// 确保返回 JSON 数据
if (!empty($cart)) {
    echo json_encode(['status' => 'success', 'cart' => $cart]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Cart is empty', 'cart' => []]);
}
?>
