<?php
// 连接第一个数据库 profile/childreninfo.sql
$conn_children = new mysqli("localhost", "root", "", "profile");
if ($conn_children->connect_error) {
    die("Connection failed: " . $conn_children->connect_error);
}

// 查询 children 数据
$sql_children = "SELECT COUNT(*) AS total_children FROM childreninfo";
$result_children = $conn_children->query($sql_children);
$total_children = ($result_children->num_rows > 0) ? $result_children->fetch_assoc()['total_children'] : 0;

// 关闭第一个数据库连接
$conn_children->close();

// 连接第二个数据库 userinformation/user.sql
$conn_parents = new mysqli("localhost", "root", "", "user_information");
if ($conn_parents->connect_error) {
    die("Connection failed: " . $conn_parents->connect_error);
}

// 查询 parents 数据
$sql_parents = "SELECT COUNT(*) AS total_parents FROM users";
$result_parents = $conn_parents->query($sql_parents);
$total_parents = ($result_parents->num_rows > 0) ? $result_parents->fetch_assoc()['total_parents'] : 0;

// 关闭第二个数据库连接
$conn_parents->close();

// 连接到 admin 数据库
$conn_admin = new mysqli("localhost", "root", "", "admin");

// 检查连接是否成功
if ($conn_admin->connect_error) {
    die("Connection failed: " . $conn_admin->connect_error);
}

// 查询 admin_subject 表中的科目总数
$sql_subject = "SELECT COUNT(*) AS total_subjects FROM admin_subject";
$result_subject = $conn_admin->query($sql_subject);

if ($result_subject->num_rows > 0) {
    // 获取科目总数
    $row = $result_subject->fetch_assoc();
    $total_subjects = $row['total_subjects'];
} else {
    $total_subjects = 0;
}

// 返回所有数据为 JSON 格式
echo json_encode([
    'total_children' => $total_children,
    'total_parents' => $total_parents,
    'total_subjects'=> $total_subjects,
]);
?>
