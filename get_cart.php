<?php
session_start(); // 启动会话

// 数据库连接函数
function dbConnect() {
    $servername = "localhost";
    $username = "your_username";
    $password = "your_password";
    $dbname = "your_database";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    return $conn;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 获取前端传来的购物车数据
    $cart = json_decode(file_get_contents('php://input'), true)['cart'];
    
    // 获取数据库连接
    $conn = dbConnect();
    
    // 遍历购物车并将每一项插入数据库
    foreach ($cart as $item) {
        $subject = $item['subject'];
        $price = $item['price'];
        $child = $item['child'];
        
        // 准备 SQL 语句
        $sql = "INSERT INTO cart_items (subject, price, child) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sds", $subject, $price, $child); // 绑定参数
        
        if (!$stmt->execute()) {
            echo json_encode(['status' => 'error', 'message' => 'Failed to save cart item: ' . $stmt->error]);
            exit;
        }
    }
    
    // 返回成功响应
    echo json_encode(['status' => 'success', 'message' => 'Cart items saved successfully']);
    
    $stmt->close();
    $conn->close();
} else {
    // 如果不是 POST 请求，返回错误
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>
