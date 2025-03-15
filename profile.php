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

    .error-message {
        color: red;
        font-size: 0.875em;
        margin-left: 10px;
    }

    .success-message {
    background-color: #d4edda;
    color: #155724;
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 10px;
    font-weight: bold;
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
                    <label for="username"> Name</label>
                    <input type="text" id="username">
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select id="gender" name="gender">
                        <option value="" disabled selected>Select your gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="ic-num">IC Number</label>
                    <input type="text" id="ic-num" placeholder="000000-00-0000">
                </div>
                <div class="form-group">
                    <label for="email">Email <span class="required">*</span> <small class="required"></small></label>
                    <input type="email" id="email" value="" readonly>
                </div>
                <div class="form-group">
                    <label for="phone-num-1">Phone Number </label>
                    <input type="text" id="phone-num-1">
                </div>
                <div class="form-group">
                    <label for="phone-num-2">Emergency Phone Number </label>
                    <input type="text" id="phone-num-2">
                </div>
                <div class="form-group">
                    <label for="relationship">Relationship</label>
                    <select id="relationship" name="relationship">
                        <option value="" disabled selected>Select Relationship With Children</option>
                        <option value="Parent">Parent</option>
                        <option value="Guardian">Guardian</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea id="address"></textarea>
                </div>
                <h3>Reset Password</h3>
                
                <div class="form-group">
                    <label for="current-password">Current Password</label>
                    <input type="password" id="current-password" autocomplete="new-password" placeholder="Enter current password">
                    <span id="current-password-error" class="error-message"></span>
                </div>
                <div class="form-group">
                    <label for="new-password">New Password</label>
                    <input type="password" id="new-password" placeholder="Enter new password">
                </div>
                <div class="form-group">
                    <label for="confirm-password">Confirm Password</label>
                   <input type="password" id="confirm-password" placeholder="Confirm new password">
                   <span id="new-password-error" class="error-message"></span>
                </div>

                <div class="form-group">
                    <button type="submit">Save Changes</button>
                </div>
            </form>
            <div id="success-message" class="success-message" style="display: none;"></div>
        </div>
    
    <div class="profile-content" id="children-info-content">
    <h3>Childrens Information</h3>
    <table class="table table-striped">
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
            
        </tbody>
    </table>
    </table>

    <div class="button-container">
        <button class="btn btn-primary" id="addChildBtn">Add Child</button>
    </div>

    <div class="select-child mt-3">
        <label for="childSelect" class="form-label">Select to display child learning classes:</label>
        <select id="childSelect" class="form-select" onchange="displayLearningStatus()">
            <option value="">--Select--</option>
            
        </select>
    </div>

    <div id="learningStatus" class="card mt-3">
        <div class="card-body">
            <h4 class="card-title">Learning Classes</h4>
            <p id="statusContent" class="card-text"></p>
        </div>
    </div>
    </div> 

    
        <div class="profile-content" id="history-content">
            <h3>Payment History</h3>
            <p>Here you can view your payment for tuition fee history.</p>
            <table class="table table-striped">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                <th>Student Name</th>
                <th>Course Name</th>
                <th>Payment Method</th>
                <th>Total Amount</th>
                <th>Payment Date</th>
                
                </tr>
            </thead>   
        <tbody>
            
        </tbody>
    </table>
    </table>
        </div>
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
                    <option value="Boy">Boy</option>
                    <option value="Girl">Girl</option>   
                </select>
            </div>
            <div class="form-group">
            <label for="kidNumber">My Kid Number</label>
            <input type="text" id="kidNumber" name="kidNumber" placeholder="000000-00-0000">
        </div>
        <div class="form-group">
            <label for="birthday">Birthday</label>
            <input type="date" id="birthday" name="birthday" readonly>
        </div>
            <div class="form-group">
                <label for="school">School</label>
                <input type="text" id="school" name="school">
            </div>
            <div class="form-group">
                <label for="year">Year</label>
                <select id="year" name="year">
                    <option value="" disabled selected>Year</option>
                    <option value="Year 1">Year 1</option>
                    <option value="Year 2">Year 2</option>   
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
        <span class="close" onclick="closeModal()">&times;</span>
        <h3>Edit Child Information</h3>

        <div class="avatar-section">
            <label for="avatar-upload">
                <div class="avatar-container">
                    <img src="img/user.jpg" alt="User Avatar" id="user-avatar">
                </div>
            </label>
            <input type="file" id="avatar-upload" accept="image/*">
        </div>

        <form id="childForm" method="post" action="profile_editchild.php">
           

            <div class="form-group">
                <label for="childName">Child Name</label>
                <input type="text" id="childName" name="name" required>
            </div>
            <div class="form-group">
                <label for="childGender">Gender</label>
                <select id="childGender" name="gender" required>
                    <option value="Boy">Boy</option>
                    <option value="Girl">Girl</option>
                </select>
            </div>
            <div class="form-group">
                <label for="kidNumber">My kid number</label>
                <input type="text" id="kidNumber" name="kidNumber" required>
            </div>
            <div class="form-group">
                <label for="childBirthday">Birthday</label>
                <input type="date" id="childBirthday" name="birthday" required>
            </div>
            <div class="form-group">
                <label for="childSchool">School</label>
                <input type="text" id="childSchool" name="school" required>
            </div>
            <div class="form-group">
                <label for="childYear">Year</label>
                <select id="childYear" name="year">
                    <option value="Year 1">Year 1</option>
                    <option value="Year 2">Year 2</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                
            </div>
        </form>
        
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


        document.getElementById('addChildForm').onsubmit = function() {
        
        document.getElementById("addChildModal").style.display = "none";
        
        };


        document.addEventListener("DOMContentLoaded", function () {
    fetchUserEmail();
});


//  get name from the childreninfo based on email
document.addEventListener("DOMContentLoaded", function() {
    
    fetch('profile_select.php') 
        .then(response => response.json())
        .then(data => {
            let select = document.getElementById("childSelect");
            select.innerHTML = '<option value="">--Select--</option>'; 

            
            const children = data.children;

            if (Array.isArray(children) && children.length > 0) {
               
                children.forEach(child => {
                    let option = document.createElement("option");
                    option.value = child.name;
                    option.textContent = child.name;
                    select.appendChild(option);
                });
            } else {
                let option = document.createElement("option");
                option.textContent = "No children found";
                option.disabled = true; 
                select.appendChild(option);
            }
        })
        .catch(error => {
            console.error('Error fetching children:', error);
        });


// based on the selected name display learning status
select.addEventListener("change", displayLearningStatus);
});

function displayLearningStatus() {
    var select = document.getElementById("childSelect");
    var selectedChild = select.value.trim();
    var statusContent = document.getElementById("statusContent");
    var learningStatus = document.getElementById("learningStatus");

    if (!selectedChild) {
        console.warn("No child selected");
        statusContent.innerHTML = "<p class='text-warning'>Please select a child.</p>";
        learningStatus.style.display = "none";
        return;
    }

    fetch(`http://localhost/TWP-Project/profile_learning.php?student_name=${encodeURIComponent(selectedChild)}`)

        .then(response => response.json())
        .then(data => {
            console.log("Fetching learning status for:", selectedChild);
            console.log("Received data:", data);

            if (!Array.isArray(data) || data.length === 0) {
                statusContent.innerHTML = "<p> No learning classes.</p>";
                learningStatus.style.display = "block";
                return;
            }

            let table = "<table class='table table-striped'><thead><tr><th>Subject</th><th>Time</th></tr></thead><tbody>";
            data.forEach(course => {
                table += `<tr><td>${course.course_name}</td><td>${course.time}</td></tr>`;
            });
            table += "</tbody></table>";

            statusContent.innerHTML = table;
            learningStatus.style.display = "block";
        })
        .catch(error => {
            console.error("Error fetching learning status:", error);
            statusContent.innerHTML = "<p class='text-danger'>Failed to fetch learning status. Please try again later.</p>";
            learningStatus.style.display = "block";
        });
}


    function openModal(childName, childGender, kidNumber, childBirthday, childSchool, childYear) {
    document.getElementById('childName').value = childName;
    document.getElementById('childGender').value = childGender;
    document.getElementById('kidNumber').value = kidNumber;
    document.getElementById('childBirthday').value = childBirthday;
    document.getElementById('childSchool').value = childSchool;
    document.getElementById('childYear').value = childYear;
    document.getElementById('childFormModal').style.display = "block";
   }

   document.querySelectorAll('.edit-btn').forEach(button => {
    button.addEventListener('click', function() {
        const row = this.closest('tr');
        const childName = row.querySelector('td:nth-child(1)').textContent.trim();
        const childGender = row.querySelector('td:nth-child(2)').textContent.trim();
        const kidNumber = row.querySelector('td:nth-child(3)').textContent.trim(); 
        const childBirthday = row.querySelector('td:nth-child(4)').textContent.trim();
        const childSchool = row.querySelector('td:nth-child(5)').textContent.trim();
        const childYear = row.querySelector('td:nth-child(6)').textContent.trim();
        
        openEditModal(childName, childGender, kidNumber, childBirthday, childSchool, childYear);
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

document.addEventListener("DOMContentLoaded", function () {
    document.querySelector("#children-info-content").addEventListener("click", function (event) {
        if (event.target.classList.contains("delete-btn")) {
            let kidNumber = event.target.getAttribute("data-kidNumber");

            if (confirm("Are you sure you want to delete this child?")) {
                fetch("profile_deletechild.php", {
                    method: "POST",
                    headers: { "Content-Type": "application/x-www-form-urlencoded" },
                    body: "kidNumber=" + encodeURIComponent(kidNumber)
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert("Children Information deleted successfully!");
                        location.reload(); 
                    } else {
                        alert("Error: " + data.error);
                    }
                })
                .catch(error => console.error("Error:", error));
            }
        }
    });
});


document.getElementById("childForm").addEventListener("submit", function (event) {
    event.preventDefault(); 

    let formData = new FormData(this);

    fetch("profile_editchild.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        
        location.reload(); 
    })
    .catch(error => console.error("Error:", error));
});

function openEditModal(name, gender, kidNumber, birthday, school, year) {
    document.getElementById("childName").value = name;
    document.getElementById("childGender").value = gender;
    document.getElementById("kidNumber").value = kidNumber;
    document.getElementById("childBirthday").value = birthday;
    document.getElementById("childSchool").value = school;
    document.getElementById("childYear").value = year;

    
    let genderSelect = document.getElementById("childGender");
    for (let i = 0; i < genderSelect.options.length; i++) {
        if (genderSelect.options[i].value.toUpperCase() === gender.toUpperCase()) {
            genderSelect.options[i].selected = true;
            break;
        }
    }

    document.getElementById("childFormModal").style.display = "block";
}

document.addEventListener("DOMContentLoaded", function () {
    fetch("profile_myinfo.php")
        .then(response => response.json())
        .then(data => {
            if (data.status === "success") {
                document.getElementById("username").value = data.data.username;
                document.getElementById("gender").value = data.data.gender;
                document.getElementById("ic-num").value = data.data.ic_number;
                document.getElementById("email").value = data.data.email;
                document.getElementById("address").value = data.data.address;
                document.getElementById("phone-num-1").value = data.data.phone_number;
                document.getElementById("phone-num-2").value = data.data.phone_number2;
                document.getElementById("relationship").value = data.data.relationship;
            } else {
                alert("Failed to load profile: " + data.message);
            }
        })
        .catch(error => console.error("Error fetching profile:", error));
});

document.querySelector("form").addEventListener("submit", async function (event) {
    event.preventDefault();

    const successMessage = document.getElementById("success-message");
    successMessage.style.display = "none"; 

    // get data
    const formData = {
        username: document.getElementById("username").value,
        gender: document.getElementById("gender").value,
        ic_num: document.getElementById("ic-num").value,
        phone_num_1: document.getElementById("phone-num-1").value,
        phone_num_2: document.getElementById("phone-num-2").value,
        relationship: document.getElementById("relationship").value,
        address: document.getElementById("address").value,
        current_password: document.getElementById("current-password").value.trim(),
        new_password: document.getElementById("new-password").value.trim(),
        confirm_password: document.getElementById("confirm-password").value.trim(),
    };

    document.getElementById("current-password-error").textContent = "";
    document.getElementById("new-password-error").textContent = "";

    // make sure new and confirm password match
    if (formData.new_password || formData.current_password) {
        if (formData.new_password !== formData.confirm_password) {
            document.getElementById("new-password-error").textContent = "* New and Confirm password do not match";
            return;
        }
    }

    try {
        const response = await fetch("update_profile.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(formData),
        });

        const result = await response.json();

        if (result.status === "error") {
            if (result.message === "Current password is incorrect") {
                document.getElementById("current-password-error").textContent = "* Current password is incorrect ";
            } else {
                console.error(result.message);
            }
            return;
        }

        // if update successful clear the line and alert successful message
        if (result.status === "success") {
            document.getElementById("current-password").value = "";
            document.getElementById("new-password").value = "";
            document.getElementById("confirm-password").value = "";

            successMessage.textContent = "Profile updated successfully!";
            successMessage.style.display = "block";
            successMessage.style.color = "green"; // green color successful message

            // after 6 second hide the successful message
            setTimeout(() => {
                successMessage.style.display = "none";
            }, 6000);
        }
    } catch (error) {
        console.error("Error:", error);
    }
});


document.addEventListener("DOMContentLoaded", function () {
    fetchChildrenInfo();
});

function fetchChildrenInfo() {
    fetch("profile_childlist.php")
        .then(response => response.json())
        .then(data => {
            const tbody = document.querySelector("#children-info-content tbody");
            tbody.innerHTML = ""; 

            if (data.status === "success") {
                data.data.forEach(child => {
                    const row = document.createElement("tr");
                    row.innerHTML = `
                        <td>${child.name}</td>
                        <td>${child.gender}</td>
                        <td>${child.kidNumber}</td>
                        <td>${child.birthday}</td>
                        <td>${child.school}</td>
                        <td>${child.year}</td>
                        <td>
                            <i class="pointer-cursor fas fa-edit text-warning edit-btn" 
                               onclick="openEditModal('${child.name}', '${child.gender}', '${child.kidNumber}','${child.birthday}', '${child.school}', '${child.year}')"></i>
                            <i class="pointer-cursor fas fa-trash-alt text-danger delete-btn" 
                               data-kidNumber="${child.kidNumber}"></i>
                        </td>
                    `;
                    tbody.appendChild(row);
                });
            } else {
                tbody.innerHTML = `<tr><td colspan='7'>${data.message}</td></tr>`;
            }
        })
        .catch(error => console.error("Error fetching child information:", error));
}


document.addEventListener("DOMContentLoaded", function () {
    fetch("profile_history.php")
        .then(response => response.json())
        .then(data => {
            if (data.status === "success" && Array.isArray(data.data)) {
                const tableBody = document.querySelector("#history-content tbody");
                tableBody.innerHTML = ""; 

                data.data.forEach(payment => {
                    const row = document.createElement("tr");
                    row.innerHTML = `
                        <td>${payment.student_name}</td>
                        <td>${payment.course_name}</td>
                        <td>${payment.payment_method}</td>
                        <td>RM${parseFloat(payment.total_amount).toFixed(2)}</td>
                        <td>${payment.order_date}</td>
                    `;
                    tableBody.appendChild(row);
                });
            } else {
                console.error("Failed to load payment history:", data.message);
            }
        })
        .catch(error => console.error("Error fetching payment history:", error.message));
});

document.getElementById("kidNumber").addEventListener("input", function () {
            let kidNumber = this.value.trim();
            let birthdayInput = document.getElementById("birthday");

            if (kidNumber.length >= 6) { // atleast 6 num
                let yearPrefix = kidNumber.substring(0, 2) >= "50" ? "19" : "20"; 
                let year = yearPrefix + kidNumber.substring(0, 2);
                let month = kidNumber.substring(2, 4);
                let day = kidNumber.substring(4, 6);

                
                if (month >= "01" && month <= "12" && day >= "01" && day <= "31") {
                    birthdayInput.value = `${year}-${month}-${day}`;
                } else {
                    birthdayInput.value = ""; 
                }
            } else {
                birthdayInput.value = ""; 
            }
        });



    </script>




    <!-- Footer Start -->
<div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
      <div class="row g-5">
        <div class="col-lg-3 col-md-6">
          <h4 class="text-white mb-4">Quick Link</h4>
          <a class="btn btn-link" href="about.html">About Us</a><br>
          <a class="btn btn-link" href="contact.html">Contact Us</a>
        </div>
        <div class="col-lg-3 col-md-6">
          <h4 class="text-white mb-4">Contact</h4>
          <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>5262A, Jalan Matahari, Bandar Indahpura, 81000 Kulai, Johor Darul Ta'zim</p>
          <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+011 775 8990</p>
          <p class="mb-2"><i class="fa fa-envelope me-3"></i>TheSeeds@gmail.com</p>
        </div>
        <div class="col-lg-3 col-md-6">
          <h4 class="text-white mb-4">Gallery</h4>
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
      </div>
    </div>
    <div class="container">
      <div class="copyright">
        <div class="row">
          <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
            &copy; <a class="border-bottom" href="#">The Seeds Learning Centre</a>, All Right Reserved.
          </div>
          <div class="col-md-6 text-center text-md-end">
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
