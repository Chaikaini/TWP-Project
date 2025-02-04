<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_information";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone_number = $_POST['phone_number'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password']; // 获取确认密码

    if ($password !== $confirm_password) {
        echo "Error: Passwords do not match!";
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (username, email, address, phone_number, gender, password) 
            VALUES ('$username', '$email', '$address', '$phone_number', '$gender', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . addslashes($conn->error);
    }
}

$conn->close();
?>
