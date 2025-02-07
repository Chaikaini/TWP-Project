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
// 你可以直接在这里硬编码数据作为测试
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
header('Content-Type: application/json');
echo json_encode($cart_data);
?>

