<?php
session_start(); // 启动会话

// 判断请求方法
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 获取请求的购物车数据
    $cart = json_decode(file_get_contents('php://input'), true)['cart'];

    // 检查是否已经有购物车数据
    if (isset($_SESSION['cart'])) {
        // 如果有，合并现有购物车和新添加的项
        $existingCart = $_SESSION['cart'];
        $cart = array_merge($existingCart, $cart);
    }

    // 将更新后的购物车数据存储到会话中
    $_SESSION['cart'] = $cart;

    // 返回成功响应
    echo json_encode(['status' => 'success', 'cart' => $_SESSION['cart']]);
} else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // 处理获取购物车数据
    $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

    // 返回购物车数据
    echo json_encode(['cart' => $cart]);
} else if ($_SERVER['REQUEST_METHOD'] === 'DEL'){
    // 处理保存购物车数据
    $cart = json_decode(file_get_contents('php://input'), true)['cart'];

    // 将购物车数据存储在会话中
    $_SESSION['cart'] = $cart;

    // 返回成功响应
    echo json_encode(['status' => 'success', 'cart' => $cart]);
}
else {
    // 如果请求方法不是 GET 或 POST，返回错误
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>
