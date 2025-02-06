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

    .stars-container .half-4-8 {
        background: linear-gradient(to right, gold 65%, #ddd 35%); 
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

        <div class="subject-grid" id="subjectGrid"></div>
    </div>

    <script>
        const subjectsData = {
            year1: [
                { name: "Year 1 English ", image: "img/english.jpg", teacher: "Mr. John", price: "85", rating: 4.6, page: "Year 1 English class.html" },
                { name: "Year 1 Malay", image: "img/malay.jpg", teacher: "Ms. Lily", price: "85", rating: 4.5, page: "Year 1 Malay class.html" },
                { name: "Year 1 Math ", image: "img/math.jpg", teacher: "Mr. David", price: "85", rating: 4.3, page: "Year 1 Math class.html" },
            ],
            year2: [
                { name: "Year 2 English ", image: "img/english.jpg", teacher: "Mr. John", price: "85", rating: 4.5, page: "Year 2 English class.html" },
                { name: "Year 2 Malay ", image: "img/malay.jpg", teacher: "Ms. Lily", price: "85", rating: 4.2, page: "Year 2 Malay class.html" },
                { name: "Year 2 Math ", image: "img/math.jpg", teacher: "Mr. David", price: "85", rating: 4.8, page: "Year 2 Math class.html" },
            ]
        };

        function showSubjects(year) {
            const subjectGrid = document.getElementById("subjectGrid");
            subjectGrid.innerHTML = "";

            subjectsData[year].forEach(subject => {
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

        if (halfStar && rating === 4.6) {
            stars[fullStars].classList.add('half');
        }

        if (halfStar && rating === 4.7) {
            stars[fullStars].classList.add('half');
        }
        
        if (halfStar && rating === 4.8) {
            stars[fullStars].classList.add('half-4-8');
        }

        
        for (let i = fullStars + halfStar; i < stars.length; i++) {
            stars[i].classList.remove('yellow', 'half', 'half-4-8');
        }

        card.querySelector('.rating-text').textContent = `${rating.toFixed(1)} / 5`;
    }
    showSubjects('year1');
</script>

     
             <!-- Footer Start -->
             <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
                <div class="container py-5">
                    <div class="row g-5">
                        <div class="col-lg-3 col-md-6">
                            <h4 class="text-white mb-3">Quick Link</h4>
                            <a class="btn btn-link" href="">About Us</a>
                            <a class="btn btn-link" href="">Contact Us</a>
                            <a class="btn btn-link" href="">Privacy Policy</a>
                            <a class="btn btn-link" href="">Terms & Condition</a>
                            <a class="btn btn-link" href="">FAQs & Help</a>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <h4 class="text-white mb-3">Contact</h4>
                            <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                            <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                            <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                            <div class="d-flex pt-2">
                                <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                                <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <h4 class="text-white mb-3">Gallery</h4>
                            <div class="row g-2 pt-2">
                                <div class="col-4">
                                    <img class="img-fluid bg-light p-1" src="img/course-1.jpg" alt="">
                                </div>
                                <div class="col-4">
                                    <img class="img-fluid bg-light p-1" src="img/course-2.jpg" alt="">
                                </div>
                                <div class="col-4">
                                    <img class="img-fluid bg-light p-1" src="img/course-3.jpg" alt="">
                                </div>
                                <div class="col-4">
                                    <img class="img-fluid bg-light p-1" src="img/course-2.jpg" alt="">
                                </div>
                                <div class="col-4">
                                    <img class="img-fluid bg-light p-1" src="img/course-3.jpg" alt="">
                                </div>
                                <div class="col-4">
                                    <img class="img-fluid bg-light p-1" src="img/course-1.jpg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <h4 class="text-white mb-3">Newsletter</h4>
                            <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                            <div class="position-relative mx-auto" style="max-width: 400px;">
                                <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                                <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="copyright">
                        <div class="row">
                            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                                &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved.
        
                                <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                                Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                            </div>
                            <div class="col-md-6 text-center text-md-end">
                                <div class="footer-menu">
                                    <a href="">Home</a>
                                    <a href="">Cookies</a>
                                    <a href="">Help</a>
                                    <a href="">FQAs</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        
        
            <!-- Back to Top -->
            <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

            
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php $conn->close(); ?>

