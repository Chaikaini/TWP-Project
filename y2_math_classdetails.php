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

// 获取课程数据，根据 class_name 和 part 来过滤
$class_name = 'Year 2 Math'; // 你可以根据需要修改这个值
$sql = "SELECT * FROM classdetail WHERE class_name = '$class_name'";  // 查询指定课程的 Part A 和 Part B
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
