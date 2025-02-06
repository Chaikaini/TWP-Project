<?php
session_start();

// 数据库连接信息
$host = "localhost";
$username = "root";  // 你的数据库用户名
$password = "";      // 你的数据库密码
$database = "admin_panel";  // 你的数据库名称

// 连接数据库
$conn = new mysqli($host, $username, $password, $database);

// 检查连接
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Database connection failed']));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // 查询用户
    $stmt = $conn->prepare("SELECT id, name, role, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {  // 确保数据库存储的是 `password_hash()`
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['role'] = $user['role'];

            echo json_encode(['success' => true, 'role' => $user['role']]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid password']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'User not found']);
    }

    $stmt->close();
    $conn->close();
    exit;
}
?>
