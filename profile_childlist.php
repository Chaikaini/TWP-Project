<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "profile";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die(json_encode(['status' => 'error', 'message' => 'Database connection failed']));
}

// check parent login
if (!isset($_SESSION['email'])) {
    echo json_encode(['status' => 'error', 'message' => 'User not logged in']);
    exit;
}

$email = $_SESSION['email']; // get parent email

// check parent child information
$sql = "SELECT name, gender, kidNumber, birthday, school, year FROM childreninfo WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

$children = [];
while ($row = $result->fetch_assoc()) {
    $children[] = $row;
}

if (!empty($children)) {
    echo json_encode(['status' => 'success', 'data' => $children]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'No children found']);
}

$stmt->close();
$conn->close();
?>
