<?php
session_start();
header('Content-Type: application/json');

// check session
if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
    echo json_encode(["success" => false, "error" => "Session expired or user not logged in."]);
    exit;
}

$servername = "localhost"; 
$username = "root";        
$password = "";            
$dbname = "profile";       

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    echo json_encode(["success" => false, "error" => "Connection failed: " . $conn->connect_error]);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $kidNumber = $_POST['kidNumber'] ?? '';
    $birthday = $_POST['birthday'] ?? '';
    $school = $_POST['school'] ?? '';
    $year = $_POST['year'] ?? '';  
    $email = $_SESSION['email']; // get email

    $sql = "INSERT INTO childreninfo (name, gender, kidNumber, birthday, school, year, email) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        echo json_encode(["success" => false, "error" => "Error preparing statement: " . $conn->error]);
        exit;
    }

    $stmt->bind_param("sssssss", $name, $gender, $kidNumber, $birthday, $school, $year, $email);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Child information added successfully!"]);
    } else {
        echo json_encode(["success" => false, "error" => "Error: " . $stmt->error]);
    }

    $stmt->close();
}

$conn->close();
?>
