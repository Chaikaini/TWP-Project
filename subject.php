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
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <!-- 顶部导航栏 -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="#" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="navbar-color"><i class="fa fa-book me-3"></i>The Seeds</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="#" class="nav-item nav-link">Home</a>
                <a href="#" class="nav-item nav-link active">Subject</a>
                <a href="#" class="nav-item nav-link">About us</a>
                <a href="#" class="nav-item nav-link">Contact us</a>
                <a href="" class="nav-item nav-link">Comment</a>
            </div>
            <a href="#" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Log out<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>

    <!-- 图标栏 -->
    <div class="icon-bar">
        <a href="#"><i class="fas fa-bell"></i></a>
        <a href="#"><i class="fas fa-shopping-cart"></i></a>
        <a href="#"><i class="fas fa-user"></i></a>
    </div>

    <!-- Breadcrumb和搜索框 -->
    <div class="breadcrumb-container d-flex justify-content-between align-items-center">
        <div>
            <h1>Subject</h1>
            <ul class="breadcrumb">
                <li><a href="Home.html">Home</a></li>
                <li>&gt;</li>
                <li>Subject</li>
            </ul>
        </div>
        <div class="search-box">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" style="width: 200px;">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </div>
    </div>

    <div class="container-main">
        <div class="year-list">
            <div class="year" onclick="showSubjects('year1')">Year 1</div>
            <div class="year" onclick="showSubjects('year2')">Year 2</div>
        </div>
        <?php
include('sub.php'); // 连接数据库

$sql = "SELECT * FROM subjects";
$result = $conn->query($sql);

// 检查查询是否成功
if (!$result) {
    die("查询失败: " . $conn->error);
}
?>

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

    <!-- JavaScript部分 -->
    <script>
        function showSubjects(year) {
            const subjectGrid = document.getElementById("subjectGrid");
            subjectGrid.innerHTML = "";

            // 你可以通过 URL 来传递不同年份的科目数据
            fetch(`get_subjects.php?year=${year}`)
                .then(response => response.json())
                .then(subjects => {
                    subjects.forEach(subject => {
                        const card = document.createElement("div");
                        card.className = "subject-card";
                        card.innerHTML = `
                            <a href="${subject.page}">
                                <img src="${subject.image}" alt="${subject.name}">
                                <h5>${subject.name}</h5>
                            </a>
                            <div class="stars-container">
                                <span class="star"></span>
                                <span class="star"></span>
                                <span class="star"></span>
                                <span class="star"></span>
                                <span class="star"></span>
                            </div>
                            <div class="rating-text">${subject.rating} / 5</div>
                        `;
                        
                        subjectGrid.appendChild(card);

                        setRating(card, subject.rating);
                    });
                });
        }

        function setRating(card, rating) {
            const stars = card.querySelectorAll('.stars-container .star');
            const fullStars = Math.floor(rating);
            const halfStar = (rating - fullStars) >= 0.5 ? 1 : 0;

            for (let i = 0; i < fullStars; i++) {
                stars[i].classList.add('yellow');
            }

            if (halfStar && rating === 4.5 ) {
                stars[fullStars].classList.add('half');
            }

            for (let i = fullStars + halfStar; i < stars.length; i++) {
                stars[i].classList.remove('yellow', 'half');
            }

            card.querySelector('.rating-text').textContent = `${rating.toFixed(1)} / 5`;
        }

        showSubjects('year1');
    </script>
</body>
</html>

<?php $conn->close(); ?>
