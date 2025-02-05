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
if (isset($_POST["saveChildBtn"])) 
{
    $cname = $_POST["child_name"];      
    $cgender = $_POST["child_gender"];      
    $ckidnum = $_POST["kid_number"];      
    $cbirthday = $_POST["child_birthday"];      
    $cschool = $_POST["child_school"];      
    $cyear = $_POST["child_year"];      
    
    mysqli_query($connect,"INSERT INTO ChildrenInfo (name, gender, kid_number, birthday, school, year) VALUES ('$cname', '$cgender', '$ckidnum', '$cbirthday', '$cschool', '$cyear')");
    
    ?>
    
        <script type="text/javascript">
            alert("<?php echo $cname.' saved' ?>");
        </script>
    
    <?php
}
?>