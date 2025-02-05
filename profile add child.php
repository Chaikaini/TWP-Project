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

    $sql = "INSERT INTO ChildrenInfo (name, gender, kid_number, birthday, school, year) 
            VALUES ('$name', '$gender', '$kidNumber', '$birthday', '$school', '$grade')";

    if ($conn->query($sql) === TRUE) {
        echo "<script type='text/javascript'>alert('$name saved');</script>";
    } else {
        echo "Error: " . addslashes($conn->error);
    }
}

$conn->close();
?>