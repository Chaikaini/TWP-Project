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

// 设置字符集，防止中文乱码
$conn->set_charset("utf8mb4");

// 获取用户选择的年级（默认为Year 1）
$year = isset($_GET['year']) ? $_GET['year'] : 'Year 1';

// 验证年级是否有效
$valid_years = ['Year 1', 'Year 2']; // 可选年级
if (!in_array($year, $valid_years)) {
    echo json_encode(['error' => 'Invalid year']);
    exit;
}

// 使用预处理语句防止SQL注入
$stmt = $conn->prepare("SELECT * FROM subjects WHERE year = ?");
$stmt->bind_param("s", $year); // "s"表示绑定的是字符串类型的参数

// 执行查询
$stmt->execute();
$result = $stmt->get_result();

// 存储查询到的学科数据
$subjects = [];
if ($result->num_rows > 0) {
    // 将查询结果存入数组
    while ($row = $result->fetch_assoc()) {
        $subjects[] = $row;
    }
} else {
    // 如果没有结果，返回错误信息
    echo json_encode(['error' => 'No subjects found for this year']);
    exit;
}

// 将数据以JSON格式返回给前端
echo json_encode($subjects);

// 关闭数据库连接
$stmt->close();
$conn->close();
?>

