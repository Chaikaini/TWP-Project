<?php
// db_connect.php 用于数据库连接
include('db_connect.php');

// 获取过滤条件
$yearFilter = isset($_GET['year']) ? $_GET['year'] : 'All';

// 查询评论数据
if ($yearFilter == 'All') {
    $sql = "SELECT * FROM comments ORDER BY created_at DESC";
} else {
    $sql = "SELECT * FROM comments WHERE year = '$yearFilter' ORDER BY created_at DESC";
}

$result = $conn->query($sql);

// 将评论数据存储到数组中
$comments = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $comments[] = $row;
    }
}

// 关闭数据库连接
$conn->close();

// 返回 JSON 格式的评论数据
echo json_encode($comments);
?>
