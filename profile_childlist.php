<?php
include  'dbprofile_connection.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "profile";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM childreninfo";
$result = $conn->query($sql);
?>


<?php
include 'dbprofile_connection.php';

$sql = "SELECT * FROM childreninfo";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["gender"] . "</td>";
        echo "<td>" . $row["kidNumber"] . "</td>";
        echo "<td>" . $row["birthday"] . "</td>";
        echo "<td>" . $row["school"] . "</td>";
        echo "<td>" . $row["year"] . "</td>";
        echo "<td>
                <i class='pointer-cursor fas fa-edit text-warning edit-btn' onclick='openEditModal(\"" . $row["name"] . "\", \"" . $row["gender"] . "\", \"" . $row["birthday"] . "\", \"" . $row["school"] . "\", \"" . $row["year"] . "\")'></i>
                <i class='pointer-cursor fas fa-trash-alt text-danger delete-btn'  data-kidNumber="<?= $row['kidNumber']; ?>"></i>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='7'>No children found</td></tr>";
}
?>


<?php $conn->close(); ?>