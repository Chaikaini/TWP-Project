<?php
// 数据库连接配置
$servername = "localhost"; // 数据库服务器
$username = "root"; // 数据库用户名（请根据实际情况修改）
$password = ""; // 数据库密码（请根据实际情况修改）
$dbname = "tuition_centre"; // 数据库名称

// 创建数据库连接
$conn = new mysqli($servername, $username, $password, $dbname);

// 检查连接是否成功
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

// 获取用户选择的年级（默认为Year 1）
$year = isset($_GET['year']) ? $_GET['year'] : 'Year 1';

// 从数据库中查询对应年级的学科信息
$sql = "SELECT * FROM subjects WHERE year = '$year'";
$result = $conn->query($sql);

// 存储查询到的学科数据
$subjects = [];
if ($result->num_rows > 0) {
    // 将查询结果存入数组
    while ($row = $result->fetch_assoc()) {
        $subjects[] = $row;
    }
}

// 关闭数据库连接
$conn->close();
?>
