<?php
include 'dbprofile_connection.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $gender = mysqli_real_escape_string($connect, $_POST['gender']);
    $kidNumber = mysqli_real_escape_string($connect, $_POST['kidNumber']);
    $birthday = mysqli_real_escape_string($connect, $_POST['birthday']);
    $school = mysqli_real_escape_string($connect, $_POST['school']);
    $year = mysqli_real_escape_string($connect, $_POST['year']);

    
    $sql = "UPDATE childreninfo SET 
                name = ?, 
                gender = ?, 
                birthday = ?, 
                school = ?, 
                year = ? 
            WHERE kidNumber = ?";  

    $stmt = mysqli_prepare($connect, $sql);
    if ($stmt) {
      
        mysqli_stmt_bind_param($stmt, "ssssss", $name, $gender, $birthday, $school, $year, $kidNumber);

        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Children information edited successfully!'); window.location.href='profile.php';</script>";
        } else {
            echo "Error updating children information: " . mysqli_error($connect);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "SQL statement preparation failed: " . mysqli_error($connect);
    }

    mysqli_close($connect);
}
?>
