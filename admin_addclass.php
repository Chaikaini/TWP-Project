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
  
    $subjectid = $_POST["subjectid"];
    $classid = $_POST["classid"];
    $year = $_POST["year"];
    $day = $_POST["day"];
    $time = $_POST["time"];
    $teacher = $_POST["teacher"];
    $enrollment = $_POST["enrollment"];

   
    $sql = "INSERT INTO admin_class (subject_id, class_id, year, day, time, teacher, capacity) 
            VALUES ('$subjectid', '$classid', '$year', '$day', '$time', '$teacher', '$enrollment')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Class added successfully!'); window.location.href='admin_classlist.php';</script>";
      
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
