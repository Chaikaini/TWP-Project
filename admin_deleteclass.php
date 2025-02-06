<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die(json_encode(["success" => false, "error" => "Connection failed"]));
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["class_id"])) {
    $class_id = $_POST["class_id"];
    $sql = "DELETE FROM admin_class WHERE class_id = '$class_id'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Class deleted successfully!'); window.location.href='admin class.php';</script>";
    } else {
        echo json_encode(["success" => false, "error" => $conn->error]);
    }
}

$conn->close();
?>
