<?php
// 启动 session
session_start();

// 连接数据库
include 'get_email.php';  // 使用正确的数据库连接文件

// 检查用户是否登录（检查 session 中是否有用户的 email）
if (!isset($_SESSION['email'])) {
    echo json_encode(['error' => 'User not logged in']);
    exit();
}

// 获取当前用户的 email
$user_email = $_SESSION['email'];

// 从数据库查询该用户的详细信息（根据 email 获取用户名）
$sql = "SELECT username FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user_email);  // 绑定 email 参数
$stmt->execute();
$result = $stmt->get_result();

// 检查是否找到该用户
if ($result->num_rows > 0) {
    // 获取用户名
    $row = $result->fetch_assoc();
    $username = $row['username'];
    // 返回欢迎信息的 JSON 响应
    echo json_encode(['message' => "Welcome, $username!"]);
} else {
    echo json_encode(['error' => 'User not found']);
}

// 关闭数据库连接
$stmt->close();
$conn->close();
?>
