<?php
// 连接到数据库
$servername = "localhost";
$username = "root"; // 替换为你的数据库用户名
$password = "";     // 替换为你的数据库密码
$dbname = "tuition_centre"; // 替换为你的数据库名

$conn = new mysqli($servername, $username, $password, $dbname);

// 检查连接
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 获取课程数据，根据 class_name 来过滤
$class_name = isset($_GET['class_name']) ? $_GET['class_name'] : 'Year 1 English'; // 如果没有传递 class_name 参数，默认使用 'Year 1 English'

// 调试输出，查看传递的 class_name
echo "Requested class name: " . htmlspecialchars($class_name); // 输出 class_name

$sql = "SELECT * FROM classdetail WHERE class_name = '$class_name'";  // 查询指定课程
$result = $conn->query($sql);

// 返回数据
if ($result->num_rows > 0) {
    $classes = [];
    while ($row = $result->fetch_assoc()) {
        $classes[] = $row;
    }
    echo json_encode($classes); // 返回 JSON 数据
} else {
    echo "No data found for class: " . htmlspecialchars($class_name); // 调试输出
}

$conn->close();
?>
