<?php
// 禁用错误报告
error_reporting(0);

// 清除任何之前的输出
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
        "child" => "Yuna",
        "subject" => "Year 1 Math",
        "teacher" => "Mr. David",
        "price" => 85
    ]
];

// 返回 JSON 格式的数据
echo json_encode($cart_data);
?>



