<?php
session_start(); // 启动会话

// 获取购物车数据
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

// 返回 JSON 格式的数据
echo json_encode(['cart' => $cart]);
?>
