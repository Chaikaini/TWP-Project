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

// 获取传递的 class_name，如果没有传递则使用默认值
$class_name = isset($_GET['class_name']) ? $_GET['class_name'] : 'Year 1 English'; 

// 根据传递的 class_name 获取课程数据
$sql = "SELECT * FROM classdetail WHERE class_name = '$class_name'";  
$result = $conn->query($sql);

// 返回数据
if ($result->num_rows > 0) {
    $classes = [];
    while ($row = $result->fetch_assoc()) {
        $classes[] = $row;
    }
    echo json_encode($classes); // 返回 JSON 数据
} else {
    echo "No data found";
}

$conn->close();
?>



