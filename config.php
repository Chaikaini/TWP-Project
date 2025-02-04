<?php
$host = "127.0.0.1";
$user = "root"; 
$pass = ""; 
$dbname = "user_information";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>
