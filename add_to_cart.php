<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subject = $_POST["subject"];
    $child = $_POST["child"];

    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = [];
    }

    $_SESSION["cart"][] = ["subject" => $subject, "child" => $child];

    echo "Added $subject for $child to cart!";
}
?>
