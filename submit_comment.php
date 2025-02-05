<?php
$servername = "localhost";
$username = "root";  
$password = "";  
$database = "tuition_centre";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $year = $_POST['year'] ?? null;
    $subject = $_POST['subject'] ?? null;
    $rating = $_POST['rating'] ?? null;
    $comment = $_POST['comment'] ?? null;

    if (!$year || !$subject || !$rating || !$comment) {
        echo "All fields are required!";
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO comments (year, subject, rating, comment) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $year, $subject, $rating, $comment);

    if ($stmt->execute()) {
        echo "Comment submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
?>
