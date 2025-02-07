<?php 
// 启用所有错误报告（临时调试）
error_reporting(E_ALL);
ini_set('display_errors', 1);


// 连接数据库
$servername = "localhost";
$username = "root";
$password = "";
$db_admin = "tuition_centre"; // admin_class 数据库
$db_profile = "profile"; // childreninfo 数据库

// 创建连接
$conn = new mysqli($servername, $username, $password, $db_admin);

// 检查连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

// 获取前端传递的 class_id 和 email
$class_id = isset($_GET['class_id']) ? $_GET['class_id'] : 'Eng0001';  // 默认 Eng0001
$email = isset($_GET['email']) ? $_GET['email'] : 'kaini@gmail.com';   // 默认 kaini@gmail.com

// 获取课程信息（admin_class 表）
$sqlClass = "SELECT CONCAT(time, ' ', day) AS class_time, capacity FROM admin_class WHERE class_id = ?";
$stmtClass = $conn->prepare($sqlClass);
$stmtClass->bind_param("s", $class_id);
$stmtClass->execute();
$resultClass = $stmtClass->get_result();

$classData = array();

if ($resultClass->num_rows > 0) {
    $rowClass = $resultClass->fetch_assoc();
    
    // 处理 capacity，拆分为 current_capacity 和 max_capacity
    list($current_capacity, $max_capacity) = explode("/", $rowClass['capacity']);

    $classData['classTime'] = $rowClass['class_time']; 
    $classData['currentCapacity'] = intval($current_capacity);
    $classData['maxCapacity'] = intval($max_capacity);
} else {
    $classData['classTime'] = "未提供";
    $classData['currentCapacity'] = 0;
    $classData['maxCapacity'] = 0;
}

// 切换到 profile 数据库
mysqli_select_db($conn, $db_profile);

// 获取孩子信息（childreninfo 表）
$sqlChildren = "SELECT id, name, grade FROM childreninfo WHERE email = ?";
$stmtChildren = $conn->prepare($sqlChildren);
$stmtChildren->bind_param("s", $email);
$stmtChildren->execute();
$resultChildren = $stmtChildren->get_result();

$childrenData = array();
$selectedChildrenCount = 0;

if ($resultChildren->num_rows > 0) {
    while ($rowChildren = $resultChildren->fetch_assoc()) {
        $childrenData[] = array(
            'id' => $rowChildren['id'],
            'name' => $rowChildren['name'],
            'grade' => $rowChildren['grade']
        );
        $selectedChildrenCount++;
    }
} else {
    $childrenData = [];
}

// 添加 selectedChildrenCount
$classData['selectedChildren'] = $selectedChildrenCount;

// 关闭数据库连接
$conn->close();

// 返回 JSON 数据
header('Content-Type: application/json');
echo json_encode(array('classData' => $classData, 'childrenData' => $childrenData));
?>
