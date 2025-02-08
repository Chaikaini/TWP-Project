<?php
// 连接数据库
include('db_connect.php'); 

// 获取查询参数
$query = isset($_GET['query']) ? $_GET['query'] : '';

// 防止空查询
if (empty($query)) {
    echo json_encode(['status' => 'error', 'message' => 'No search term provided']);
    exit;
}

// 创建查询语句
$stmt = $conn->prepare("SELECT * FROM subjects WHERE name LIKE ? OR year LIKE ?");
$searchTerm = "%" . $query . "%";
$stmt->bind_param("ss", $searchTerm, $searchTerm);

$stmt->execute();
$result = $stmt->get_result();

// 返回结果
if ($result->num_rows > 0) {
    $response = [];
    while ($row = $result->fetch_assoc()) {
        $response[] = $row;
    }
    echo json_encode(['status' => 'success', 'data' => $response]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'No results found for query: ' . $query]);
}

$stmt->close();

}

// 返回JSON响应
echo json_encode($response);
?>
