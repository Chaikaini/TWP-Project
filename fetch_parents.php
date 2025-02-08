<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_information";

// 创建数据库连接
$conn = new mysqli($servername, $username, $password, $dbname);

// 检查连接是否成功
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

// 处理删除请求
if (isset($_GET['username'])) {
    $parentUsername = $_GET['username'];  // 获取前端传递的 `username`

    // 执行删除操作
    $sql = "DELETE FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("s", $parentUsername);
        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => '删除成功']);
        } else {
            echo json_encode(['status' => 'error', 'message' => '删除失败']);
        }
        $stmt->close();
    } else {
        echo json_encode(['status' => 'error', 'message' => '数据库错误']);
    }
    $conn->close();
    exit();
}

// 查询所有家长数据
$sql = "SELECT username, phone_number, gender, address, email FROM users";
$result = $conn->query($sql);

$parents = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $parents[] = $row;
    }
}

$conn->close();

// 返回 JSON 格式的数据
echo json_encode($parents);
?>
