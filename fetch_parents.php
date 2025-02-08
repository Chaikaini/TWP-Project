<?php
$host = "localhost"; // 你的数据库主机
$user = "root"; // 你的数据库用户名
$pass = ""; // 你的数据库密码
$dbname = "user_information"; // 你的数据库名称

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Database connection failed"]));
}

// 检查是否有删除请求
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id"])) {
    $id = intval($_POST["id"]); // 确保 ID 是整数
    $stmt = $conn->prepare("DELETE FROM parents WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Parent deleted successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Delete failed"]);
    }
    $stmt->close();
    exit;
}

// 获取家长数据
$result = $conn->query("SELECT id, username, gender, address, phone_number, email FROM parents");
$parents = [];
while ($row = $result->fetch_assoc()) {
    $parents[] = $row;
}

echo json_encode($parents);
$conn->close();
?>
