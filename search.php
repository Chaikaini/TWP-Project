<?php
// 连接数据库
include('db_connect.php'); 

// 获取查询参数
// 获取查询参数
$query = isset($_GET['query']) ? $_GET['query'] : '';

// 如果查询为空，返回错误信息
if (empty($query)) {
    echo json_encode(['status' => 'error', 'message' => '没有提供搜索词']);
    exit;
}

// 准备 SQL 查询
$stmt = $conn->prepare("SELECT * FROM subjects WHERE name LIKE ? OR year LIKE ?");
$searchTerm = "%" . $query . "%";
$stmt->bind_param("ss", $searchTerm, $searchTerm);

$stmt->execute();
$result = $stmt->get_result();

// 检查是否有结果
if ($result->num_rows > 0) {
    $response = [];
    while ($row = $result->fetch_assoc()) {
        $response[] = $row;
    }
    // 返回成功的 JSON 响应
    echo json_encode(['status' => 'success', 'data' => $response]);
} else {
    // 没有结果时返回错误信息
    echo json_encode(['status' => 'error', 'message' => '没有找到相关结果']);
}

$stmt->close();
?>
