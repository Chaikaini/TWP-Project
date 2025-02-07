<?php
include  'dbprofile_connection.php';

$servername = "localhost"; 
$username = "root";        
$password = "";            
$dbname = "profile";       

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

 
    $name = $_POST['name'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $kidNumber = $_POST['kidNumber'] ?? '';
    $birthday = $_POST['birthday'] ?? '';
    $school = $_POST['school'] ?? '';
    $grade = $_POST['year'] ?? '';  

   
    $sql = "INSERT INTO childreninfo (name, gender, kidNumber, birthday, school, year) 
    VALUES (?, ?, ?, ?, ?, ?)";

   
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("ssssss", $name, $gender, $kidNumber, $birthday, $school, $year);

   
    if ($stmt->execute()) {
        echo "<script>alert('Child information added successfully!'); window.location.href='profile.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

