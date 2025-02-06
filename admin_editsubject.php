<?php
include 'dbadmin_connection.php'; // 连接数据库

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subjectID = $_POST['subjectID'];
    $subject = $_POST['subject'];
    $year = $_POST['year'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    // 更新数据库
    $sql = "UPDATE subjects SET 
                subject = '$subject', 
                year = '$year', 
                price = '$price',
                description = '$description' 
            WHERE subjectID = '$subjectID'";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Subject edit successfully!'); window.location.href='admin subject.php';</script>";
    } else {
        echo "Error updating subject: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
