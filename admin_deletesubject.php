<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die(json_encode(["success" => false, "error" => "Connection failed"]));
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["subject_ID"])) {
    $subject_ID = $_POST["subject_ID"];
    $sql = "DELETE FROM admin_subject WHERE subject_ID = '$subject_ID'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Subject deleted successfully!'); window.location.href='admin subject.php';</script>";
    } else {
        echo json_encode(["success" => false, "error" => $conn->error]);
    }
}

$conn->close();
?>
