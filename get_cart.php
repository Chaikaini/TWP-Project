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
header('Content-Type: application/json');
$cartItems = [
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
echo json_encode($cartItems);
?>



