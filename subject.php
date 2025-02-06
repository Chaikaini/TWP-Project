<?php
// 连接数据库
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tuition_centre";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);

// 检查连接
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 获取 year 参数（如 year1 或 year2）
$year = isset($_GET['year']) ? $_GET['year'] : 'year1';

// 根据 year 获取科目数据
$sql = "SELECT * FROM subjects WHERE year = '$year'";
$result = $conn->query($sql);

// 检查是否有数据
if ($result->num_rows > 0) {
    // 输出每条记录
    while($row = $result->fetch_assoc()) {
        echo "
        <div class='subject-card'>
            <a href='{$row['page']}'>
                <img src='{$row['image']}' alt='{$row['subject_name']}'>
                <h5>{$row['subject_name']}</h5>
            </a>
            <div class='stars-container'>";
        
        // 添加星级评分
        for ($i = 0; $i < 5; $i++) {
            if ($i < $row['rating']) {
                echo "<span class='star yellow'></span>";
            } else {
                echo "<span class='star'></span>";
            }
        }

        echo "</div>
            <div class='rating-text'>{$row['rating']} / 5</div>
            <div class='capacity'>{$row['capacity']}</div>
        </div>";
    }
} else {
    echo "没有可用的科目";
}

// 关闭数据库连接
$conn->close();
?>
