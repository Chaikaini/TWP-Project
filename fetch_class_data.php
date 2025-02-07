<?php
// 禁用错误报告
error_reporting(0);

// 连接数据库
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tuition_centre"; // 你的数据库

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);

// 检查连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

// 获取课程信息（admin_class.sql），假设 time 和 day 需要拼接
$sqlClass = "SELECT CONCAT(time, ' ', day) AS class_time, class_capacity FROM admin_class WHERE class_id = 1"; // 假设class_id为1
$resultClass = $conn->query($sqlClass);

$classData = array();

if ($resultClass->num_rows > 0) {
    $rowClass = $resultClass->fetch_assoc();
    $classData['classTime'] = $rowClass['class_time']; // 拼接后的时间
    $classData['classCapacity'] = $rowClass['class_capacity'];
} else {
    $classData['classTime'] = "未提供";
    $classData['classCapacity'] = "未提供";
}

// 获取孩子信息（childreninfo.sql），假设用户已经登录并传递了email
$email = "kaini@gmail.com"; // 假设用户登录的email
$sqlChildren = "SELECT id, name, grade FROM childreninfo WHERE email = '$email'";
$resultChildren = $conn->query($sqlChildren);

$childrenData = array();

if ($resultChildren->num_rows > 0) {
    while($rowChildren = $resultChildren->fetch_assoc()) {
        $childrenData[] = array(
            'id' => $rowChildren['id'],
            'name' => $rowChildren['name'],
            'grade' => $rowChildren['grade']
        );
    }
} else {
    $childrenData = [];
}

$conn->close();

// 返回数据为JSON格式
header('Content-Type: application/json'); // 确保返回 JSON 格式
echo json_encode(array('classData' => $classData, 'childrenData' => $childrenData));
?>
