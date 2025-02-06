<?php
include('sub.php'); // 连接数据库

$sql = "SELECT * FROM subjects";
$result = $conn->query($sql);

// 检查查询是否成功
if (!$result) {
    die("查询失败: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>科目列表</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>选择你的课程</h1>
    <div class="subject-list">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='subject'>";
                echo "<img src='" . $row['image'] . "' alt='" . $row['name'] . "'>";
                echo "<h2>" . $row['name'] . "</h2>";
                echo "<p>教师: " . $row['teacher'] . "</p>";
                echo "<p>价格: $" . $row['price'] . "</p>";
                echo "<p>评分: " . $row['rating'] . "</p>";
                echo "<a href='" . $row['page'] . "'>查看详情</a>"; // 跳转到 HTML 页面
                echo "</div>";
            }
        } else {
            echo "<p>暂无课程</p>";
        }
        ?>
    </div>
</body>
</html>

<?php $conn->close(); ?>

