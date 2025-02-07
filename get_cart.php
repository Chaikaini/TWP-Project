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
// 设置 Content-Type 为 JSON，确保返回的数据是正确的 JSON 格式
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


