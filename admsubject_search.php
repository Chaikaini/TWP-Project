<?php
include 'dbadmin_connection.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//admin subject search
$searchTerm = isset($_GET['query']) ? trim($_GET['query']) : '';

$sql = "SELECT * FROM admin_subject";
if (!empty($searchTerm)) {
    
    $searchTerm = $conn->real_escape_string($searchTerm);
    $sql = "SELECT * FROM admin_subject 
            WHERE subject_ID LIKE '%$searchTerm%' 
               OR subject LIKE '%$searchTerm%'";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["subject_ID"] . "</td>";
        echo "<td>" . $row["subject"] . "</td>";
        echo "<td>" . $row["year"] . "</td>";
        echo "<td>" . $row["price"] . "</td>";
        echo "<td>
                <i class='pointer-cursor fas fa-edit text-warning edit-btn' 
                onclick='openEditModal(
                    \"" . $row["subject_ID"] . "\", 
                    \"" . addslashes($row["subject"]) . "\", 
                    \"" . $row["year"] . "\", 
                    \"" . $row["price"] . "\", 
                    \"" . addslashes($row["description"]) . "\"
                )'></i>
                <i class='pointer-cursor fas fa-trash-alt text-danger delete-btn' data-subjectID='" . $row['subject_ID'] . "'></i>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>No matching subjects found</td></tr>";
}


$conn->close();
?>
