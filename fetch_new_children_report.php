<?php
include 'db.php'; // 确保你的数据库连接文件正确

$start_date = $_GET['start_date'] ?? '';
$end_date = $_GET['end_date'] ?? '';

if (!$start_date || !$end_date) {
    echo json_encode([]); // 如果日期为空，返回空数组
    exit;
}

// 修改 SQL 以匹配 `childreninfo` 表
$sql = "SELECT id, name, gender, kid_number, birthday FROM childreninfo 
        WHERE birthday BETWEEN ? AND ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $start_date, $end_date);
$stmt->execute();
$result = $stmt->get_result();

$children = [];
while ($row = $result->fetch_assoc()) {
    $children[] = $row;
}

echo json_encode($children);
?>
