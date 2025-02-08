<?php
// 先连接数据库，使用 PDO
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tuition_centre";

// 使用 PDO 连接数据库
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "连接失败: " . $e->getMessage();
    exit();
}

// 检查是否存在 'query' 参数，如果不存在则返回一个错误
if (!isset($_GET['query'])) {
    echo json_encode(['status' => 'error', 'message' => 'Missing query parameter']);
    exit();
}

$query = $_GET['query'];

// 如果没有传入 'year' 参数，则使用默认值 'Year 1'
$year = isset($_GET['year']) ? $_GET['year'] : 'Year 1';

// 使用 SQL 查询
$sql = "SELECT * FROM subjects WHERE name LIKE :query AND year = :year";
$stmt = $pdo->prepare($sql);
$stmt->execute(['query' => '%' . $query . '%', 'year' => $year]);

// 获取所有匹配的结果
$subjects = $stmt->fetchAll(PDO::FETCH_ASSOC);

// 返回结果为 JSON 格式
echo json_encode(['status' => 'success', 'data' => $subjects]);

// 关闭数据库连接
$pdo = null;
?>
