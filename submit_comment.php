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
    $year = $_POST['year'];
    $subject = $_POST['subject'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    $stmt = $conn->prepare("INSERT INTO comments (year, subject, rating, comment) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssis", $year, $subject, $rating, $comment);


    if ($stmt->execute()) {
        echo "Comment submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
?>
