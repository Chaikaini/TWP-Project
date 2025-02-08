<?php
include('db.php'); // 引入数据库连接文件

// 从数据库获取childreninfo表的数据
$sql = "SELECT * FROM childreninfo";
$result = $conn->query($sql);

$children = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $children[] = $row;
    }
}

// 返回 JSON 数据
echo json_encode($children);

$conn->close();
?>
