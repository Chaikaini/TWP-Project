<?php
include 'dbadmin_connection.php'; // connect database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subjectID = $_POST['subjectID'];
    $subject = $_POST['subject'];
    $year = $_POST['year'];
    $price = $_POST['price'];
    $description = $_POST['description'];

   
    $sql = "UPDATE admin_subject SET 
                subject = '$subject', 
                year = '$year', 
                price = '$price',
                description = '$description' 
            WHERE subject_ID = '$subjectID'";

    if (mysqli_query($connect, $sql)) { 
        echo "<script>alert('Subject edit successfully!'); window.location.href='admin subject.php';</script>";
    } else {
        echo "Error updating subject: " . mysqli_error($connect);
    }

    mysqli_close($connect);
}

?>
