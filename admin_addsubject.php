<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "admin"; 

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $subjectid = $_POST["subjectID"];
    $subject = $_POST["subject"];
    $year = $_POST["year"];
    $price = $_POST["price"];
    $description = $_POST["description"];
    

   
    $sql = "INSERT INTO admin_subject (subject_ID, subject, year, price, description) 
            VALUES ('$subjectID', '$subject', '$year', '$price', '$description')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Subject added successfully!'); window.location.href='admin subject.php';</script>";
      
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
