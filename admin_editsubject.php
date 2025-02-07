<?php
include 'dbadmin_connection.php'; // 连接数据库

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subjectID = $_POST['subjectID'];
    $subject = $_POST['subject'];
    $year = $_POST['year'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    // 更新数据库
    $sql = "UPDATE admin_subject SET 
                subject = '$subject', 
                year = '$year', 
                price = '$price',
                description = '$description' 
            WHERE subject_ID = '$subjectID'";

    if (mysqli_query($connect, $sql)) { // 使用 $connect 而不是 $conn
        echo "<script>alert('Subject edit successfully!'); window.location.href='admin subject.php';</script>";
    } else {
        echo "Error updating subject: " . mysqli_error($connect);
    }

    mysqli_close($connect);
}

?>
