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

header('Content-Type: application/json');

// 假设课程数据包含图片路径
$subjects = [
    'year1' => [
        [
            'name' => 'Year 1 English',
            'image' => 'images/english.jpg',  // 图片路径
            'teacher' => 'Mr. John',
            'price' => '85',
            'rating' => 4.6,
            'page' => 'Year 1 English class.html'
        ],
        [
            'name' => 'Year 1 Malay',
            'image' => 'images/malay.jpg',  // 图片路径
            'teacher' => 'Ms. Lily',
            'price' => '85',
            'rating' => 4.5,
            'page' => 'Year 1 Malay class.html'
        ],
        [
            'name' => 'Year 1 Math',
            'image' => 'images/math.jpg',  // 图片路径
            'teacher' => 'Mr. David',
            'price' => '85',
            'rating' => 4.3,
            'page' => 'Year 1 Math class.html'
        ],
    ],
    'year2' => [
        [
            'name' => 'Year 2 English',
            'image' => 'images/english.jpg',  // 图片路径
            'teacher' => 'Mr. John',
            'price' => '85',
            'rating' => 4.5,
            'page' => 'Year 2 English class.html'
        ],
        [
            'name' => 'Year 2 Malay',
            'image' => 'images/malay.jpg',  // 图片路径
            'teacher' => 'Ms. Lily',
            'price' => '85',
            'rating' => 4.2,
            'page' => 'Year 2 Malay class.html'
        ],
        [
            'name' => 'Year 2 Math',
            'image' => 'images/math.jpg',  // 图片路径
            'teacher' => 'Mr. David',
            'price' => '85',
            'rating' => 4.8,
            'page' => 'Year 2 Math class.html'
        ],
    ]
];

$year = $_GET['year'];
echo json_encode($subjects[$year]);



$stmt->close();
$conn->close();
?>

<!-- 返回HTML文件的主体部分 -->
