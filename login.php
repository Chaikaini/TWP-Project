<?php
session_start();
header('Content-Type: application/json'); 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_information";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die(json_encode(["error" => "Database connection failed"]));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $email = $conn->real_escape_string($email);
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];

        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];

            echo json_encode([
                "success" => true,
                "username" => $row['username'],
                "email" => $row['email']
            ]);
            exit();
        } else {
            echo json_encode(["error" => "Incorrect password"]);
            exit();
        }
    } else {
        echo json_encode(["error" => "User not found"]);
        exit();
    }
}

$conn->close();
?>
