<?php
// 数据库连接设置
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_information";

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
if (isset($_GET['username'])) {
    $parentUsername = $_GET['username'];  // 假设你传递的是 `username`

    // 执行删除操作
    $sql = "DELETE FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("s", $parentUsername);
        $stmt->execute();
    } else {
        echo json_encode(['status' => 'error', 'message' => '删除失败']);
        exit();
    }
}

// 关闭连接
$conn->close();

// 返回 JSON 格式的结果
echo json_encode($parents);
?>
