<?php 
// 启用所有错误报告（临时调试）
error_reporting(E_ALL);
ini_set('display_errors', 1);

// 连接数据库
$servername = "localhost";
$username = "root";
$password = "";
$db_profile = "profile"; // childreninfo 数据库

// 创建连接
$conn = new mysqli($servername, $username, $password, $db_profile);

// 检查连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

// 获取前端传递的 email
$email = isset($_GET['email']) ? $_GET['email'] : 'kaini@gmail.com';   // 默认 kaini@gmail.com

// 获取孩子信息（childreninfo 表）
$sqlChildren = "SELECT id, name, grade FROM childreninfo WHERE email = ?";
$stmtChildren = $conn->prepare($sqlChildren);
$stmtChildren->bind_param("s", $email);
$stmtChildren->execute();
$resultChildren = $stmtChildren->get_result();

$childrenData = array();

if ($resultChildren->num_rows > 0) {
    while ($rowChildren = $resultChildren->fetch_assoc()) {
        $childrenData[] = array(
            'id' => $rowChildren['id'],
            'name' => $rowChildren['name'],
            'grade' => $rowChildren['grade']
        );
    }
} else {
    $childrenData = [];
}

// 关闭数据库连接
$conn->close();

// 返回 JSON 数据
header('Content-Type: application/json');
echo json_encode(array('childrenData' => $childrenData));
?>
