<?php
header('Content-Type: application/json');

// 启动会话并获取当前用户的 email
session_start();
$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';

// 如果没有 email（用户未登录），返回错误信息
if (empty($email)) {
    echo json_encode(["error" => "User is not logged in"]);
    exit();
}

// 引入数据库连接
include 'db.php';

// 准备 SQL 查询
$sql = "SELECT name FROM childreninfo WHERE email = ?";

// 使用 prepare 语句防止 SQL 注入
$stmt = $conn->prepare($sql);

// 如果 prepare 语句失败，返回错误
if (!$stmt) {
    echo json_encode(["error" => "SQL prepare error: " . $conn->error]);
    exit();
}

// 绑定参数
$stmt->bind_param("s", $email);  // 绑定 email 参数

// 执行查询
$stmt->execute();

// 检查查询是否执行成功
if ($stmt->error) {
    echo json_encode(["error" => "SQL execution error: " . $stmt->error]);
    exit();
}

// 获取查询结果
$result = $stmt->get_result();

// 如果没有找到孩子数据，返回空数组
if ($result->num_rows == 0) {
    echo json_encode([]); // 返回空数组，表示没有孩子数据
    exit();
}

// 处理查询结果
$childrenNames = [];
while ($row = $result->fetch_assoc()) {
    $childrenNames[] = $row['name'];  // 获取孩子的名字
}

// 返回孩子名字的 JSON 数据
echo json_encode($childrenNames);  // 返回 JSON 数组

// 关闭数据库连接
$stmt->close();
$conn->close();
?>
