<?php
session_start();
header("Content-Type: application/json");

if (!empty($_SESSION["cart"])) {
    echo json_encode($_SESSION["cart"]);
} else {
    echo json_encode([]);
}

?>
<?php
// 禁用错误报告
error_reporting(0);

// 清除之前的输出缓冲区
ob_clean();

// 设置 Content-Type 为 JSON
header('Content-Type: application/json');

// 你的测试数据
$cart_data = [
    [
            {
                image: 'img/english.jpg',
                subject: 'English class',
                teacher: 'Mr. John',
                year: 'Year 1', 
                price: 85,
                time: 'Monday, 2.30pm-4.30pm',
                capacity: '20/30',
                student: 'Yuna',
                startMonth: 0 // January
            },
            {
                image: 'img/math.jpg',
                subject: 'Math  class',
                teacher: 'Mr. David',
                year: 'Year 1', 
                price: 85,
                time: 'Wednesday, 2.30pm-4.30pm',
                capacity: '20/30',
                student: 'Yuna',
                startMonth: 0
            }
];

// 确保没有额外的输出，直接返回 JSON 数据
echo json_encode($cart_data);
exit; // 结束脚本执行，确保没有多余输出
?>


