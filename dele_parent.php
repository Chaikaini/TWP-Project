<?php
// 数据库连接设置
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_information"; // 请替换为你的数据库名称

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);

// 检查连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

// 获取 POST 请求的 JSON 数据
$data = json_decode(file_get_contents("php://input"), true);
$username = $data['username']; // 获取要删除的用户名

// 执行删除操作
if (isset($username)) {
    $sql = "DELETE FROM parents WHERE username = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("s", $username); // 使用字符串绑定参数
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            // 删除成功
            echo json_encode(['status' => 'success']);
        } else {
            // 如果没有删除任何记录
            echo json_encode(['status' => 'error', 'message' => 'can not search this parent']);
        }
    } else {
        // SQL 执行失败
        echo json_encode(['status' => 'error', 'message' => 'Deleted Fail']);
    }

    $stmt->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Action Fail']);
}

// 关闭连接
$conn->close();
?>
