<?php
session_start();

if (!isset($_SESSION['role'])) {
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit;
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin_panel";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Database connection failed']));
}

if (isset($_GET['action']) && $_GET['action'] === 'getAdmins') {
    $result = $conn->query("SELECT id, name, gender, age, email FROM users WHERE role = 'admin' OR role = 'super_admin'");

    $admins = [];
    while ($row = $result->fetch_assoc()) {
        $admins[] = $row;
    }

    echo json_encode(['success' => true, 'admins' => $admins, 'userRole' => $_SESSION['role']]);
    exit;
}

if (isset($_POST['action']) && $_POST['action'] === 'addAdmin') {
    if ($_SESSION['role'] !== 'super_admin') {
        echo json_encode(['success' => false, 'message' => 'Unauthorized']);
        exit;
    }

    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $password = password_hash("default_password", PASSWORD_BCRYPT);

    $stmt = $conn->prepare("INSERT INTO users (name, gender, age, email, password, role) VALUES (?, ?, ?, ?, ?, 'admin')");
    $stmt->bind_param("ssiss", $name, $gender, $age, $email, $password);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'id' => $stmt->insert_id]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error: ' . $stmt->error]);
    }
    exit;
}

if (isset($_GET['action']) && $_GET['action'] === 'deleteAdmin' && isset($_GET['id'])) {
    if ($_SESSION['role'] !== 'super_admin') {
        echo json_encode(['success' => false, 'message' => 'Unauthorized']);
        exit;
    }

    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ? AND role != 'super_admin'");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error: ' . $stmt->error]);
    }
    exit;
}

$conn->close();
?>
