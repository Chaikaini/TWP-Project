<?php
include  'dbadmin_connection.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM admin_subject";
$result = $conn->query($sql);
?>




 <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Subject ID</th>
                    <th>Subject</th>
                    <th>Year</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
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
                echo "<tr><td colspan='8'>No classes found</td></tr>";
            }
            
                ?>
            </tbody>
        </table>
    </div>
</div>




<?php $conn->close(); ?>