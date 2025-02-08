<?php
// 数据库连接设置
$servername = "localhost";  // 数据库主机（通常是 localhost）
$username = "root";         // 数据库用户名（替换为你的用户名）
$password = "";             // 数据库密码（替换为你的密码）
$dbname = "user_information";  // 确保数据库名称正确

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);

// 检查连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

// 查询父母的数据
$sql = "SELECT username, phone_number, gender, address, email FROM users";
$result = $conn->query($sql);

// 存储查询结果
$parents = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $parents[] = $row;
    }
}
// 获取家长数据
$parentId = $_GET['username'];  // 假设你传递的是 `username` 而不是 `id`

$sql = "DELETE FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $parentId);
if ($stmt->execute()) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => '删除失败']);
}

// 关闭连接
$conn->close();

// 返回 JSON 格式的结果
echo json_encode($parents);
?>
