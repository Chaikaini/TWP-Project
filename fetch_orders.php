<?php
$servername = "localhost";
$username = "root";  
$password = "";      
$dbname = "order";   

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['order_id'])) {
    $order_id = $_POST['order_id'];

    if ($order_id) {
        $order_id = $conn->real_escape_string($order_id);
        $sql = "DELETE FROM orders WHERE order_id = '$order_id'";

        if ($conn->query($sql) === TRUE) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["success" => false, "error" => $conn->error]);
        }
        exit;  
    } else {
        echo json_encode(["success" => false, "error" => "Order ID is missing."]);
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search_term'])) {
    $search_term = $_POST['search_term'];
    $search_term = $conn->real_escape_string($search_term);

    $sql = "SELECT * FROM orders WHERE student_name LIKE '%$search_term%' OR order_id LIKE '%$search_term%' ORDER BY order_date DESC";
    $result = $conn->query($sql);

    $orders = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $orders[] = $row;
        }
    }

    echo json_encode($orders);
    exit;  
}

$sql = "SELECT * FROM orders ORDER BY order_date DESC";
$result = $conn->query($sql);

$orders = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $orders[] = $row;
    }
}

echo json_encode($orders);

$conn->close();
?>
