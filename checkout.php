<?php
$servername = "127.0.0.1";
$username = "root"; // 你的数据库用户名
$password = ""; // 你的数据库密码
$dbname = "tuition_centre";

// 创建数据库连接
$conn = new mysqli($servername, $username, $password, $dbname);

// 检查连接是否成功
if ($conn->connect_error) {
    die("数据库连接失败: " . $conn->connect_error);
}

// 查询购物车数据
$sql = "SELECT * FROM cart_items";
$result = $conn->query($sql);

// 创建 JSON 格式数据
$cartItems = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $cartItems[] = $row;
    }
}

// 输出 JSON 数据
header('Content-Type: application/json');
echo json_encode($cartItems);

// 关闭数据库连接
$conn->close();
?>
