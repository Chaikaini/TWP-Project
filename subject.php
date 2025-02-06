<?php
// Database connection
include('sub.php');

$sql = "SELECT * FROM subjects WHERE year = 1";
$result = $conn->query($sql);
$year1Subjects = [];

while ($row = $result->fetch_assoc()) {
    $year1Subjects[] = [
        'name' => $row['name'],
        'image' => $row['image'],
        'teacher' => $row['teacher'],
        'price' => $row['price'],
        'rating' => $row['rating'],
        'page' => $row['page']
    ];
}

// Convert the PHP array to JSON to use in JavaScript
$year1SubjectsJson = json_encode($year1Subjects);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Your head content here -->
</head>
<body>
    <!-- Your HTML structure here -->

    <div class="container-main">
        <div class="year-list">
            <div class="year" onclick="showSubjects('year1')">Year 1</div>
            <div class="year" onclick="showSubjects('year2')">Year 2</div>
        </div>

        <div class="subject-grid" id="subjectGrid"></div>
    </div>

    <script>
        // Pass the PHP data to JavaScript
        const year1Subjects = <?php echo $year1SubjectsJson; ?>;
        const year2Subjects = []; // Similarly, add Year 2 subjects if needed

        function showSubjects(year) {
            let subjects = [];
            if (year === 'year1') {
                subjects = year1Subjects;
            } else if (year === 'year2') {
                subjects = year2Subjects; // Replace with actual Year 2 data
            }

            const subjectGrid = document.getElementById('subjectGrid');
            subjectGrid.innerHTML = ''; // Clear previous subjects

            // Loop through the subjects and render the cards
            subjects.forEach(subject => {
                const subjectCard = document.createElement('div');
                subjectCard.classList.add('subject-card');
                subjectCard.innerHTML = `
                    <img src="${subject.image}" alt="${subject.name}">
                    <h5>${subject.name}</h5>
                    <p>Teacher: ${subject.teacher}</p>
                    <p>Price: $${subject.price}</p>
                    <div class="stars-container">
                        <!-- Example stars rendering based on rating -->
                        ${renderStars(subject.rating)}
                    </div>
                    <p class="rating-text">${subject.rating} / 5</p>
                    <a href="${subject.page}" class="btn btn-primary">View Details</a>
                `;
                subjectGrid.appendChild(subjectCard);
            });
        }

        // Function to render star ratings
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
