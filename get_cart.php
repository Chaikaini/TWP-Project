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
        "child" => "Yuna",
        "subject" => "Year 1 English",
        "teacher" => "Mr. John",
        "price" => 85
    ],
    [
        "child" => "David",
        "subject" => "Year 1 Math",
        "teacher" => "Mr. David",
        "price" => 85
    ]
];

// 确保没有额外的输出，直接返回 JSON 数据
echo json_encode($cart_data);
exit; // 结束脚本执行，确保没有多余输出
?>


