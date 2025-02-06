<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Subjects</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="year-list">
        <div class="year" onclick="loadSubjects(1)">Year 1</div>
        <div class="year" onclick="loadSubjects(2)">Year 2</div>
    </div>

    <div class="subject-grid" id="subjectGrid"></div>

    <script>
        function loadSubjects(year) {
            $.get("subjects.php?year=" + year, function(data) {
                let subjects = JSON.parse(data);
                let subjectGrid = document.getElementById("subjectGrid");
                subjectGrid.innerHTML = ""; // 清空

                subjects.forEach(subject => {
                    let card = `<div class='subject-card'>
                        <a href='${subject.page}'>
                            <img src='${subject.image}' alt='${subject.name}'>
                            <h5>${subject.name}</h5>
                        </a>
                        <div class='rating-text'>${subject.rating} / 5</div>
                    </div>`;
                    subjectGrid.innerHTML += card;
                });
            });
        }

        loadSubjects(1); // 默认加载 Year 1
    </script>
</body>
</html>
