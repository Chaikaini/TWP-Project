<?php
$host = 'localhost';
$dbname = 'order';
$username = 'your_username';
$password = 'your_password';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 获取日期参数
    $start_date = $_GET['start_date'] ?? '2000-01-01'; // 默认最早日期
    $end_date = $_GET['end_date'] ?? date('Y-m-d'); // 默认当前日期

    // 确保输入格式正确
    if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $start_date) || !preg_match('/^\d{4}-\d{2}-\d{2}$/', $end_date)) {
        die(json_encode(["error" => "Invalid date format"]));
    }

    // 查询数据库
    $sql = "SELECT id, student_name, teacher_name, order_date FROM `order` WHERE order_date BETWEEN :start_date AND :end_date";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':start_date', $start_date);
    $stmt->bindParam(':end_date', $end_date);
    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // 只返回 student_name 或 teacher_name 包含 "Math" 的数据
    $filteredResults = array_filter($results, function($row) {
        return stripos($row['student_name'], 'Math') !== false || stripos($row['teacher_name'], 'Math') !== false;
    });

    echo json_encode(array_values($filteredResults));
} catch (PDOException $e) {
    echo json_encode(["error" => "Database error: " . $e->getMessage()]);
}
?>
