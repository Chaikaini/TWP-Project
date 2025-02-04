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
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // 加密密码

    $sql = "INSERT INTO users (username, email, address, phone_number, gender, password) 
            VALUES ('$username', '$email', '$address', '$phone_number', '$gender', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Registration successful!'); window.location.href='registration.html';</script>";
} else {
    echo "<script>alert('Error: " . $conn->error . "'); window.history.back();</script>";
}


}

$conn->close();
?>
