<?php
include 'db.php';

$start_date = $_GET['start_date'] ?? '';
$end_date = $_GET['end_date'] ?? '';

if (!$start_date || !$end_date) {
    echo json_encode(["error" => "Missing dates"]);
    exit;
}

// 调试：检查传入的日期
var_dump($start_date, $end_date);

$sql = "SELECT id, name, gender, kid_number, birthday FROM childreninfo 
        WHERE birthday BETWEEN ? AND ?";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die(json_encode(["error" => "SQL Error: " . $conn->error]));
}

$stmt->bind_param("ss", $start_date, $end_date);
$stmt->execute();
$result = $stmt->get_result();

$children = [];
while ($row = $result->fetch_assoc()) {
    $children[] = $row;
}

// 调试：输出查询结果
var_dump($children);

echo json_encode($children);
?>
