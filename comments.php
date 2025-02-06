<?php
// db_connect.php 用于数据库连接
include('db_connect.php');

// 设置固定的过滤条件
$subjectFilter = 'English';
$yearFilter = 'Year 1';

// 构造 SQL 查询条件
$sql = "SELECT * FROM comments WHERE subject = '$subjectFilter' AND year = '$yearFilter' ORDER BY created_at DESC";

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
