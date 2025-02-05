<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "tuition_centre";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT year, subject, rating, comment, created_at FROM comments ORDER BY created_at DESC";
$result = $conn->query($sql);

$comments = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $comments[] = $row;
    }
}

header('Content-Type: application/json');

echo json_encode($comments, JSON_PRETTY_PRINT);

$conn->close();
?>
