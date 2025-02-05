<?php
$servername = "localhost"; 
$username = "root";      
$password = "";            
$database = "admin_panel"; 

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8");
?>
