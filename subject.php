<?php
// 连接到数据库
$servername = "localhost";  // 数据库服务器
$username = "root"; // 数据库用户名
$password = ""; // 数据库密码
$dbname = "tuition_centre";  // 数据库名称

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);

// 检查连接是否成功
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 获取当前选择的年级，默认为 Year 1
$selectedYear = 'Year 1';
if (isset($_GET['year'])) {
    $selectedYear = $_GET['year'];
}

// 查询数据库中的科目
$sql = "SELECT name, teacher, price, rating, image, page FROM subjects WHERE year = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $selectedYear); // 绑定参数
$stmt->execute();
$result = $stmt->get_result();

// 将查询结果存储在数组中
$subjectsData = [];
while ($row = $result->fetch_assoc()) {
    $subjectsData[] = $row;
}

$stmt->close();
$conn->close();
?>

<!-- 返回HTML文件的主体部分 -->
