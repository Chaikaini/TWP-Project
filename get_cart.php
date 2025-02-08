<?php
include('db_connect.php'); // 确保连接数据库
header('Content-Type: application/json');

$conn = dbConnect();

// 查询数据库中的购物车数据
$sql = "SELECT * FROM cart_items";
$result = $conn->query($sql);

$cart = [];
while ($row = $result->fetch_assoc()) {
    $cart[] = $row;
}

// 关闭数据库连接
$conn->close();

// 返回 JSON 数据
echo json_encode(['status' => 'success', 'cart' => $cart]);
?>
