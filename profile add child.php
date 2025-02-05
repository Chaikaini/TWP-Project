
<?php
include("connectmyprofile.php");

if (isset($_POST["name"])) 
{
    $name = $_POST["name"];
    $gender = $_POST["gender"];
    $kidNumber = $_POST["kidNumber"];
    $birthday = $_POST["birthday"];
    $school = $_POST["school"];
    $grade = $_POST["grade"];
    
    $query = "INSERT INTO ChildrenInfo (name, gender, kid_number, birthday, school, year) VALUES ('$name', '$gender', '$kidNumber', '$birthday', '$school', '$grade')";
    
    if (mysqli_query($connect, $query)) {
        echo "<script type='text/javascript'>alert('$name saved');</script>";
    } else {
        echo "<script type='text/javascript'>alert('Error: " . mysqli_error($connect) . "');</script>";
    }
}
?>