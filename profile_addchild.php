<?php

$servername = "localhost"; 
$username = "root";        
$password = "";            
$dbname = "profile";       

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $kidNumber = $_POST['kidNumber'];
    $birthday = $_POST['birthday'];
    $school = $_POST['school'];
    $grade = $_POST['grade'];

    
    $sql = "INSERT INTO childreninfo (name, gender, kidNumber, birthday, school, grade) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $name, $gender, $kidNumber, $birthday, $school, $grade);

    
    if ($stmt->execute()) {
        echo "<script>alert('Child information added successfully!'); window.location.href='profile.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    
    $stmt->close();
}

$conn->close();
?>