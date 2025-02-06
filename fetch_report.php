<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "order";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['date']) && !empty($_GET['date'])) {
    $start_date = $_GET['date'];
    $end_date = $_GET['date']; 
} else {
    $start_date = date("Y-m-01");
    $end_date = date("Y-m-d"); 
}

$sql = "SELECT id, student_name, order_id, order_date, total_amount 
        FROM orders 
        WHERE order_date BETWEEN ? AND ? 
        ORDER BY order_date ASC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $start_date, $end_date);
$stmt->execute();
$result = $stmt->get_result();

$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
?>
