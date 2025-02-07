<?php
include  'dbprofile_connection.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "profile";


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die(json_encode(["success" => false, "error" => "Connection failed"]));
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["kidNumber"])) {
    $kidNumber = $_POST["kidNumber"]; 
    $sql = "DELETE FROM childreninfo WHERE kidNumber = '$kidNumber'"; 

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Children Information deleted successfully!'); window.location.href='profile.php';</script>";
    } else {
        echo json_encode(["success" => false, "error" => $conn->error]);
    }
}

$conn->close();
?>
