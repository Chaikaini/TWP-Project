<?php
session_start();

// 数据库连接信息
$servername = "localhost"; 
$username = "root";        
$password = "";            
$dbname = "order";  

// 连接数据库
$conn = new mysqli($servername, $username, $password, $dbname);

// 检查数据库连接
if ($conn->connect_error) {
    die(json_encode(["error" => "Database connection failed: " . $conn->connect_error]));
}

// 确保用户已登录
if (!isset($_SESSION['email'])) {
    echo json_encode(["error" => "User not logged in"]);
    exit;
}

$email = $_SESSION['email']; // 获取当前用户 email
$studentName = isset($_GET['student_name']) ? $_GET['student_name'] : ''; // 改成 student_name

// 确保 student_name 不为空
if (empty($studentName)) {
    echo json_encode(["error" => "No student selected"]);
    exit;
}

// 查询 orders 表，获取该 student_name 和 email 相关的课程信息
$sql = "SELECT course_name, time FROM orders WHERE email = ? AND student_name = ?";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die(json_encode(["error" => "SQL prepare failed: " . $conn->error]));
}
$stmt->bind_param("ss", $email, $studentName);
$stmt->execute();
$result = $stmt->get_result();

$courses = [];
while ($row = $result->fetch_assoc()) {
    $courses[] = [
        "course_name" => $row["course_name"],
        "time" => $row["time"]
    ];
}

// 关闭数据库连接
$stmt->close();
$conn->close();

// 返回 JSON 数据
echo json_encode($courses);
?>

