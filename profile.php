<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Profile</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="The Seeds Learning Centre,profile" name="keywords">
    <meta content="The Seeds Learning Centre | Profile" name="description">

    <!-- Favicon -->
    <link href="img/the seeds.jpg" rel="icon" type="image/png">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate.min.css" rel="stylesheet">
    <link href="lib/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
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

        .profile-container {
            max-width: 900px;
            height: auto;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 20px;
            margin-top: 50px;
            display: flex;
        }
        .profile-header {
            text-align: center;
            margin-bottom: 20px;
            width: 100%;
        }
        .profile-options {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            margin-right: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 10px;
            height: 300px;
        }
        .profile-options a {
            text-decoration: none;
            color: #000;
            font-size: 18px;
            padding: 10px;
            width: 100%;
            transition: color 0.3s ease;
        }
        .profile-options a:hover, .profile-options a.active {
            color: #007bff;
            text-decoration: underline;
        }
        .profile-content {
            flex: 3;
            display: none;
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 20px;
        }
        .profile-content.active {
            display: block;
        }
        input[type=submit]:hover {
            background-color: rgb(71, 145, 69);
            color: rgb(12, 12, 12); 
        }
        .form-container {
            max-width: 900px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 20px;
            margin-top: 50px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-group textarea {
            resize: vertical;
        }
        .form-group h3 {
            margin-top: 30px;
        }
        
        .form-group button {
            background-color:#15ca39;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #14a631;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 95%;
            overflow: auto;
            background-color: rgba(0,0,0,0.5);
        }
        .modal-content {
            background-color: #fff;
            margin: 10% auto;
            padding: 20px;
            border-radius: 8px;
            width: 30%;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            position: relative;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 24px;
            font-weight: bold;
            position: absolute; 
            top: 10px; 
            right: 10px;
        }
        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input,
        .form-group select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .btn {
            padding: 10px 25px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-primary {
            background-color: #007bff;
            color: #fff;
            
            
        }
        
        .button-container {
        text-align: right;
        margin-top: 10px;
    }

        .form-select {
        width: 150px; 
    }

    .status-circle {
        height: 15px;
        width: 15px;
        background-color: rgb(27, 217, 87);
        border-radius: 50%;
        display: inline-block;
    }
    .avatar-section {
       text-align: center;
       margin-bottom: 20px;
       margin-top: 30px;
   }

    .avatar-container {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        overflow: hidden;
        border: 2px solid #ccc;
        display: inline-block;
    }

    .avatar-container img {
       width: 100%;
       height: 100%;
       object-fit: cover;
    }

    #avatar-upload {
    display: none;
     }

     .required {
    color: red;
    }

    textarea {
    width: 100%;
    height: 100px;
    padding: 8px;
    box-sizing: border-box;
    }

    .pointer-cursor {
    cursor:pointer !important;
           
    }

    button.btn.btn-primaryy {
    width: 100%;
    padding: 10px;
    background-color:#15ca39;
    color: white;
    border: none;
    cursor: pointer;
}

button.btn.btn-primaryy:hover {
    background-color:#14a631;
}

    </style>
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="navbar-color"><i class="fa fa-book me-3"></i>The Seeds</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="member.html" class="nav-item nav-link">Home</a>
                <a href="subject.html" class="nav-item nav-link">Subject</a>
                <a href="about.html" class="nav-item nav-link">About us</a>
                <a href="contsct.html" class="nav-item nav-link">Contact us</a>
                <a href="comment.html" class="nav-item nav-link">Comment</a>
            </div>
            <a href="login.html" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Log out<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Icon Bar Start -->
    <div class="icon-bar">
        <a href="notification.html"><i class="fas fa-bell"></i></a>
        <a href="cart.html"><i class="fas fa-shopping-cart"></i></a>
        <a href="profile.php"><i class="fas fa-user"></i></a>
    </div>
    <!-- Icon Bar End -->

    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">My Profile</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="member.html">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <div class="profile-container">
        <div class="profile-options">
            <a href="#" id="my-info-tab" class="active">My Information</a>
            <a href="#" id="children-info-tab">Childrens Information</a>
            <a href="#" id="history-tab">Payment History</a>
        </div>
    
        <div class="profile-content active" id="my-info-content">
            <h3>My Information</h3>

            <div class="avatar-section">
                <label for="avatar-upload">
                    <div class="avatar-container">
                        <img src="img/user.jpg" alt="User Avatar" id="user-avatar">
                    </div>
                </label>
                <input type="file" id="avatar-upload" accept="image/*" style="display: none;">
            </div>

            <form>
                <div class="form-group">
                    <label for="name"> Name</label>
                    <input type="text" id="name">
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select id="gender" name="gender">
                        <option value="" disabled selected>Select your gender</option>
                        <option value="parent">Male</option>
                        <option value="guardian">Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="ic-num">IC Number</label>
                    <input type="text" id="ic-num">
                </div>
                <div class="form-group">
                    <label for="email">Email <span class="required">*</span> <small class="required"></small></label>
                    <input type="email" id="email" value="" readonly>
                </div>
                <div class="form-group">
                    <label for="phone-num">Phone Number 1</label>
                    <input type="text" id="phone-num">
                </div>
                <div class="form-group">
                    <label for="phone-num">Phone Number 2</label>
                    <input type="text" id="phone-num">
                </div>
                <div class="form-group">
                    <label for="relationship">Relationship</label>
                    <select id="relationship" name="relationship">
                        <option value="" disabled selected>Select Relationship With Children</option>
                        <option value="parent">Parent</option>
                        <option value="guardian">Guardian</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea id="address"></textarea>
                </div>
                <h3>Reset Password</h3>
                <div class="form-group">
                    <label for="current-password">Current Password</label>
                    <input type="text" id="current-password">
                </div>
                <div class="form-group">
                    <label for="new-password">New Password</label>
                    <input type="text" id="new-password">
                </div>
                <div class="form-group">
                    <label for="confirm-password">Confirm Password</label>
                    <input type="text" id="confirm-password">
                </div>
                <div class="form-group">
                    <button type="submit">Save Changes</button>
                </div>
            </form>
        </div>
    
        <div class="profile-content" id="children-info-content">
    <h3>Childrens Information</h3>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>My kid number</th>
                    <th>Birthday</th>
                    <th>School</th>
                    <th>Year</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php include 'profile_childlist.php'; ?>
            </tbody>
        </table>
    </div>

    <div class="button-container">
        <button class="btn btn-primary" id="addChildBtn">Add Child</button>
    </div>

    <div class="select-child mt-3">
        <label for="childSelect" class="form-label">Select to display child learning status:</label>
        <select id="childSelect" class="form-select" onchange="displayLearningStatus()">
            <option value="">--Select--</option>
            <option value="Yuna">Yuna</option>
            <option value="John Doe">John Doe</option>
        </select>
    </div>

    <div id="learningStatus" class="card mt-3">
        <div class="card-body">
            <h4 class="card-title">Learning Status</h4>
            <p id="statusContent" class="card-text"></p>
        </div>
    </div>
</div>

<div class="profile-content" id="history-content">
    <h3>Payment History</h3>
    <p>Here you can view your payment for tuition fee history.</p>
    <!-- Add form or content for History -->
</div>

<!-- Add Child Modal -->
<div id="addChildModal" class="modal">
    <div class="modal-content pointer-cursor">
        <span class="close" onclick="closeModal()">&times;</span>
        <h3>Add Child Information</h3>

        <div class="avatar-section">
            <label for="avatar-upload">
                <div class="avatar-container">
                    <img src="img/user.jpg" alt="User Avatar" id="user-avatar">
                </div>
            </label>
            <input type="file" id="avatar-upload" accept="image/*">
        </div>

        <form id="addChildForm" method="post" action="profile_addchild.php">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <select id="gender" name="gender">
                    <option value="" disabled selected>Gender</option>
                    <option value="boy">Boy</option>
                    <option value="girl">Girl</option>
                </select>
            </div>
            <div class="form-group">
                <label for="kidNumber">My kid number</label>
                <input type="text" id="kidNumber" name="kidNumber">
            </div>
            <div class="form-group">
                <label for="birthday">Birthday</label>
                <input type="date" id="birthday" name="birthday">
            </div>
            <div class="form-group">
                <label for="school">School</label>
                <input type="text" id="school" name="school">
            </div>
            <div class="form-group">
                <label for="year">Year</label>
                <select id="year" name="year">
                    <option value="" disabled selected>Year</option>
                    <option value="year1">Year 1</option>
                    <option value="year2">Year 2</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
    </div>
</div>

<!-- Child Modal -->
<div id="childFormModal" class="modal">
    <div class="modal-content pointer-cursor">
       close" onclick="closeModal()">&times;</span>
        <h3>Edit Child Information</h3>

        <div class="avatar-section">
            <label for="avatar-upload">
                <div class="avatar-container">
                    <img src="img/user.jpg" alt="User Avatar" id="user-avatar">
                </div>
            </label>
            <input type="file" id="avatar-upload" accept="image/*">
        </div>

        <form id="childForm">
            <div class="form-group">
                <label for="childName">Child Name</label>
                <input type="text" id="childName">
            </div>
            <div class="form-group">
                <label for="childGender">Gender</label>
                <select id="childGender">
                    <option>Boy</option>
                    <option>Girl</option>
                </select>
            </div>
            <div class="form-group">
                <label for="childBirthday">Birthday</label>
                <input type="date" id="childBirthday">
            </div>
            <div class="form-group">
                <label for="childSchool">School</label>
                <input type="text" id="childSchool">
            </div>
            <div class="form-group">
                <label for="childYear">Year</label>
                <select id="childYear">
                    <option>Year 1</option>
                    <option>Year 2</option>
                </select>
            </div>
        </form>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
    </div>
</div>

  
       


   
    

    <!-- JavaScript to handle tab switching -->
<script>
    document.getElementById('my-info-tab').addEventListener('click', function() {
        showContent('my-info-content', this);
    });
    document.getElementById('children-info-tab').addEventListener('click', function() {
        showContent('children-info-content', this);
    });
    document.getElementById('history-tab').addEventListener('click', function() {
        showContent('history-content', this);
    });

    function showContent(contentId, element) {
        var contents = document.querySelectorAll('.profile-content');
        contents.forEach(function(content) {
            content.classList.remove('active');
        });

        document.getElementById(contentId).classList.add('active');

        var tabs = document.querySelectorAll('.profile-options a');
        tabs.forEach(function(tab) {
            tab.classList.remove('active');
        });
        element.classList.add('active');
    }

    document.getElementById('addChildBtn').onclick = function() {
        document.getElementById('addChildModal').style.display = 'block';
    }

    function closeModal() {
        document.getElementById('addChildModal').style.display = 'none';
        document.getElementById('childFormModal').style.display = "none";
    }

    window.onclick = function(event) {
        var modal = document.getElementById('addChildModal');
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    }

    document.getElementById('addChildForm').onsubmit = function(event) {
        event.preventDefault();
        document.getElementById("addChildModal").style.display = "none";
    };

    function displayLearningStatus() {
        var select = document.getElementById("childSelect");
        var statusContent = document.getElementById("statusContent");
        var learningStatus = document.getElementById("learningStatus");

        var courses = {
            "Yuna": [
                { subject: "English", year: "Year 1", day: "Monday", time: "2:30pm-4:30pm", status: "active" },
                { subject: "Math", year: "Year 1", day: "Wednesday", time: "2:30pm-4:30pm", status: "active" }
            ],
            "John Doe": [
                { subject: "English", year: "Year 1", day: "Monday", time: "2:30pm-4:30pm" },
                { subject: "Malay", year: "Year 1", day: "Thursday", time: "2:30pm-4:30pm" }
            ]
        };

        var selectedChild = select.value;
        if (selectedChild && courses[selectedChild]) {
            var table = "<table class='table table-striped'><thead><tr><th>Subject</th><th>Year</th><th>Day</th><th>Time</th><th>Status</th></tr></thead><tbody>";
            courses[selectedChild].forEach(function(course) {
                table += "<tr><td>" + course.subject + "</td><td>" + course.year + "</td><td>" + course.day + "</td><td>" + course.time + "</td><td><span class='status-circle'></span></td></tr>";
            });
            table += "</tbody></table>";
            statusContent.innerHTML = table;
        } else {
            statusContent.innerHTML = "";
        }

        learningStatus.style.display = selectedChild ? "block" : "none";
    }

    function openModal(childName, childGender, childBirthday, childSchool, childYear) {
        document.getElementById('childName').value = childName;
        document.getElementById('childGender').value = childGender;
        document.getElementById('childBirthday').value = childBirthday;
        document.getElementById('childSchool').value = childSchool;
        document.getElementById('childYear').value = childYear;
        document.getElementById('childFormModal').style.display = "block";
    }

    document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener('click', function() {
            const row = this.closest('tr');
            const childName = row.querySelector('td:nth-child(1)').textContent;
            const childGender = row.querySelector('td:nth-child(2)').textContent;
            const childBirthday = row.querySelector('td:nth-child(4)').textContent;
            const childSchool = row.querySelector('td:nth-child(5)').textContent;
            const childYear = row.querySelector('td:nth-child(6)').textContent;
            openModal(childName, childGender, childBirthday, childSchool, childYear);
        });
    });

    document.querySelector('.close').addEventListener('click', function() {
        document.getElementById('childFormModal').style.display = "none";
    });

    window.addEventListener('click', function(event) {
        if (event.target == document.getElementById('childFormModal')) {
            document.getElementById('childFormModal').style.display = "none";
        }
    });

    document.getElementById("avatar-upload").addEventListener("change", function(event) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById("user-avatar").src = e.target.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    });

    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll(".delete-btn").forEach(button => {
            button.addEventListener("click", function() {
                let kidNumber = this.getAttribute("data-kidNumber");
                if (confirm("Are you sure you want to delete this child?")) {
                    fetch("profile_deletechild.php", {
                        method: "POST",
                        headers: { "Content-Type": "application/x-www-form-urlencoded" },
                        body: "kidNumber=" + kidNumber
                    })
                    .then(response => response.text())
                    .then(data => {
                        alert(data);
                        location.reload();
                    })
                    .catch(error => console.error("Error:", error));
                }
            });
        });
    });
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
    <script src="lib/wow.min.js"></script>
    <script src="lib/easing.min.js"></script>
    <script src="lib/waypoints.min.js"></script>
    <script src="lib/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

</body>
</html>
