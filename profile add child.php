<!DOCTYPE html>
<html>
<head>
    <title>Add Child</title>
    <link href="design.css" type="text/css" rel="stylesheet" />
</head>
<body>

<div id="wrapper">

    

        <h1>Add Child</h1>

        <form name="addChildForm" method="post" action="">

            <p><label>Name:</label><input type="text" name="child_name" size="80"></p>
         
            <p><label>Gender:</label>
                <select name="child_gender">
                    <option value="Boy">Boy</option>
                    <option value="Girl">Girl</option>
                </select>
            </p>
            
            <p><label>My Kid Number:</label><input type="text" name="kid_number" size="20"></p>

            <p><label>Birthday:</label><input type="date" name="child_birthday"></p>
            
            <p><label>School:</label><input type="text" name="child_school" size="100"></p>

            <p><label>Year:</label><input type="text" name="child_year" size="20"></p>
            
            <p><input type="submit" name="saveChildBtn" value="SAVE CHILD"></p>

        </form>
    
    </div>
    
</div>

</body>
</html>

<?php
include("connectmyprofile.php");

if (isset($_POST["name"])) 
{
    $name = $_POST["name"];
    $gender = $_POST["gender"];
    $kidNumber = $_POST["kidNumber"];
    $birthday = $_POST["birthday"];
    $school = $_POST["school"];
    $grade = $_POST["grade"];
    
    $query = "INSERT INTO ChildrenInfo (name, gender, kid_number, birthday, school, year) VALUES ('$name', '$gender', '$kidNumber', '$birthday', '$school', '$grade')";
    
    if (mysqli_query($connect, $query)) {
        echo "<script type='text/javascript'>alert('$name saved');</script>";
    } else {
        echo "<script type='text/javascript'>alert('Error: " . mysqli_error($connect) . "');</script>";
    }
}
?>