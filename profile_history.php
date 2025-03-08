<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "order";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Database connection failed"]));
}


if (!isset($_SESSION['email'])) {
    echo json_encode(["status" => "error", "message" => "User not logged in"]);
    exit;
}

$email = $_SESSION['email']; // get email

// get history data
$sql = "SELECT student_name, course_name, payment_method, total_amount, order_date 
        FROM orders 
        WHERE email = ? 
        ORDER BY order_date DESC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

$history = [];
while ($row = $result->fetch_assoc()) {
    $history[] = $row;
}

// return JSON result
if (!empty($history)) {
    echo json_encode(["status" => "success", "data" => $history]);
} else {
    echo json_encode(["status" => "error", "message" => "No payment history found"]);
}

$stmt->close();
$conn->close();
?>
