<?php
session_start();  // 启动会话

// 获取POST数据
$cartItem = json_decode(file_get_contents('php://input'), true);

// 检查购物车会话变量是否存在，如果不存在则创建一个空数组
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// 将新添加的项添加到购物车
$_SESSION['cart'][] = $cartItem;

// 返回响应
echo json_encode(['status' => 'success']);
?>
