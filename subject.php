<?php
include('sub.php'); // 连接数据库

// 查询所有课程数据
$sql = "SELECT * FROM subjects";
$result = $conn->query($sql);

// 检查查询是否成功
if (!$result) {
    die("查询失败: " . $conn->error);
}

// 查询Year 1和Year 2的课程
$sqlYear1 = "SELECT * FROM subjects WHERE year = 1";
$sqlYear2 = "SELECT * FROM subjects WHERE year = 2";

$resultYear1 = $conn->query($sqlYear1);
$resultYear2 = $conn->query($sqlYear2);

// 将Year 1和Year 2的课程存入数组
$year1Subjects = [];
$year2Subjects = [];

while ($row = $resultYear1->fetch_assoc()) {
    $year1Subjects[] = [
        'name' => $row['name'],
        'image' => $row['image'],
        'teacher' => $row['teacher'],
        'price' => $row['price'],
        'rating' => $row['rating'],
        'page' => $row['page']
    ];
}

while ($row = $resultYear2->fetch_assoc()) {
    $year2Subjects[] = [
        'name' => $row['name'],
        'image' => $row['image'],
        'teacher' => $row['teacher'],
        'price' => $row['price'],
        'rating' => $row['rating'],
        'page' => $row['page']
    ];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Subject</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="The Seeds Learning Centre, subject" name="keywords">
    <meta content="The Seeds Learning Centre | Subject" name="description">

    <link href="img/the seeds.jpg" rel="icon" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/animate.min.css" rel="stylesheet">
    <link href="lib/owl.carousel.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <style>
        .icon-bar {
            display: flex;
            justify-content: flex-end;
            padding: 10px 0;
            background-color: #f8f9fa;
            border-bottom: 1px solid #caccce;
        }

        .icon-bar a {
            margin: 0 15px;
            color: #000000;
            font-size: 24px;
            transition: color 0.3s ease;
        }

        .icon-bar a:hover {
            color: #73cf67;
        }

        .breadcrumb-container {
            padding: 20px;
            background-color: #f8f9fa;
            border-bottom: 1px solid #ccc;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .breadcrumb-container .search-box {
            display: flex;
            align-items: center;
        }

        .breadcrumb-container .search-box input {
            width: 200px;
            margin-right: 10px;
        }

        .breadcrumb-container h1 {
            margin: 0;
            font-size: 28px;
            font-weight: bold;
        }

        .breadcrumb-container .breadcrumb {
            margin: 0;
            padding: 0;
            background: none;
            font-size: 14px;
            list-style: none;
            display: flex;
            gap: 5px;
        }

        .breadcrumb-container .breadcrumb li {
            color: #555;
        }

        .breadcrumb-container .breadcrumb li a {
            color: #007bff;
            text-decoration: none;
        }

        .breadcrumb-container .breadcrumb li a:hover {
            text-decoration: underline;
        }

        .container-main {
            display: flex;
            padding: 20px;
        }

        .year-list {
            width: 30%;
            border-right: 1px solid #ccc;
            padding-right: 15px;
        }

        .year-list .year {
            padding: 10px;
            margin: 10px 0;
            cursor: pointer;
            background-color: #f8f9fa;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            text-align: center;
        }

        .year-list .year:hover {
            background-color: #e0f7e4;
        }

        .subject-grid {
            width: 70%;
            padding-left: 15px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 15px;
        }

        .subject-card {
            background-color: #f8f9fa;
            border-radius: 8px;
            text-align: center;
            padding: 15px;
            transition: transform 0.3s, background-color 0.3s;
        }

        .subject-card:hover {
            transform: scale(1.05);
            background-color: #e0f7e4;
        }

        .subject-card img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
            border-radius: 8px;
        }

        .subject-card h5 {
            font-size: 16px;
            margin: 0;
            color: #333;
        }

        .stars-container {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }

        .stars-container .star {
            width: 20px;
            height: 20px;
            background-color: #ddd;
            clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%);
            margin-right: 5px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .stars-container .yellow {
            background-color: gold;
        }

        .stars-container .half {
            background: linear-gradient(to right, gold 50%, #ddd 50%);
        }

        .rating-text {
            font-size: 14px;
            color: #666;
            margin-top: 5px;
            text-align: center;
        }
    </style>
</head>

<body>
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

    <div class="icon-bar">
        <a href="#"><i class="fas fa-bell"></i></a>
        <a href="#"><i class="fas fa-shopping-cart"></i></a>
        <a href="#"><i class="fas fa-user"></i></a>
    </div>

    <div class="breadcrumb-container d-flex justify-content-between align-items-center">
        <div>
            <h1>Subject</h1>
            <ul class="breadcrumb">
                <li><a href="Home.html">Home</a></li>
                <li>Subject</li>
            </ul>
        </div>
        <div class="search-box">
            <input type="text" placeholder="Search for subject...">
            <button class="btn btn-success">Search</button>
        </div>
    </div>

    <div class="container-main">
        <div class="year-list">
            <div class="year" onclick="showSubjects('year1')">Year 1</div>
            <div class="year" onclick="showSubjects('year2')">Year 2</div>
        </div>

        <div class="subject-grid" id="subjectGrid"></div>
    </div>

    <script>
        // 传递PHP数据到JavaScript
        const year1Subjects = <?php echo json_encode($year1Subjects); ?>;
        const year2Subjects = <?php echo json_encode($year2Subjects); ?>;

        function showSubjects(year) {
            let subjects = [];
            if (year === 'year1') {
                subjects = year1Subjects;
            } else if (year === 'year2') {
                subjects = year2Subjects;
            }

            const subjectGrid = document.getElementById('subjectGrid');
            subjectGrid.innerHTML = ''; // 清空之前的课程

            subjects.forEach(subject => {
                const subjectCard = document.createElement('div');
                subjectCard.classList.add('subject-card');
                subjectCard.innerHTML = `
                    <img src="${subject.image}" alt="${subject.name}">
                    <h5>${subject.name}</h5>
                    <p>Teacher: ${subject.teacher}</p>
                    <p>Price: $${subject.price}</p>
                    <div class="stars-container">
                        ${renderStars(subject.rating)}
                    </div>
                    <p class="rating-text">${subject.rating} / 5</p>
                    <a href="${subject.page}" class="btn btn-primary">View Details</a>
                `;
                subjectGrid.appendChild(subjectCard);
            });
        }

        function renderStars(rating) {
            let stars = '';
            for (let i = 0; i < 5; i++) {
                if (i < rating) {
                    stars += '<div class="star yellow"></div>';
                } else if (i < Math.floor(rating) + 0.5) {
                    stars += '<div class="star half"></div>';
                } else {
                    stars += '<div class="star"></div>';
                }
            }
            return stars;
        }
    </script>
</body>
</html>

<?php
$conn->close();
?>
