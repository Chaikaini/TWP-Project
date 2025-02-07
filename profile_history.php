<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "order";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM orders";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["student_name"] . "</td>";
        echo "<td>" . $row["course_name"] . "</td>";
        echo "<td>" . $row["payment_method"] . "</td>";
        echo "<td>" . $row["total_amount"] . "</td>";
        echo "<td>" . $row["order_date"] . "</td>";
        
    }
} else {
    echo "<tr><td colspan='7'>No payment history found</td></tr>";
}
?>


<?php $conn->close(); ?>

