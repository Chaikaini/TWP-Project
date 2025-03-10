<?php
session_start();

$servername = "localhost"; 
$username = "root";        
$password = "";            
$dbname = "profile"; 

// 连接数据库
$conn = new mysqli($servername, $username, $password, $dbname);

// 检查连接是否成功
if ($conn->connect_error) {
    die(json_encode(["error" => "Database connection failed: " . $conn->connect_error]));
}

// 确保用户已登录
if (!isset($_SESSION['email'])) {
    echo json_encode(["error" => "User not logged in"]);
    exit;
}

$email = $_SESSION['email']; // 直接从 session 获取 email
$sql = "SELECT name FROM childreninfo WHERE email = ?";

$stmt = $conn->prepare($sql);
if (!$stmt) {
    die(json_encode(["error" => "SQL prepare failed: " . $conn->error]));
}
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

$children = [];
while ($row = $result->fetch_assoc()) {
    $children[] = ["name" => $row["name"]];
}

// 关闭数据库连接
$stmt->close();
$conn->close();

// 返回 JSON 数据，包含 email 和孩子的信息
echo json_encode([
    "email" => $email,
    "children" => $children
]);
?>
