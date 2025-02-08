<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_information";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "连接失败: " . $conn->connect_error]));
}

// 处理删除请求
if (isset($_GET['id'])) {
    $parentId = $_GET['id'];

    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("i", $parentId);
        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "删除成功"]);
        } else {
            echo json_encode(["status" => "error", "message" => "删除失败"]);
        }
        $stmt->close();
    } else {
        echo json_encode(["status" => "error", "message" => "数据库错误"]);
    }
    $conn->close();
    exit();
}

// 获取家长数据
$query = "SELECT user_id, username, email, address, phone_number, gender FROM users";
$result = $conn->query($sql);

$parents = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $parents[] = $row;
    }
}

$conn->close();
echo json_encode($parents);
?>
