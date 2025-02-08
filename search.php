<?php
// 连接数据库
include('db_connect.php'); 

// 获取查询参数
$query = isset($_GET['query']) ? $_GET['query'] : '';

// 防止SQL注入
$query = htmlspecialchars($query);

// 初始化响应数据
$response = array('status' => 'error', 'message' => 'No results found.', 'data' => []);

// 如果查询参数存在
if ($query) {
    $conn = dbConnect();

    // 使用LIKE查询，匹配年份或课程名
    $stmt = $conn->prepare("SELECT * FROM subjects WHERE subject LIKE ? OR year LIKE ?");
    $searchTerm = "%" . $query . "%";
    $stmt->bind_param("ss", $searchTerm, $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();

    // 如果查询结果有数据
    if ($result->num_rows > 0) {
        $response['status'] = 'success';
        $response['message'] = 'Results found';
        $response['data'] = [];

        // 将结果存入响应数据
        while ($row = $result->fetch_assoc()) {
            $response['data'][] = array(
                'subject' => $row['subject'],
                'description' => $row['description'], // 假设你有描述字段
                'year' => $row['year'],  // 如果你有年份字段
                // 其他需要的数据
            );
        }
    }

    $stmt->close();
    $conn->close();
}

// 返回JSON响应
echo json_encode($response);
?>
