<?php 
  // session_start();
  $servername = "localhost";
  $username = "root";
  $password = "";
  $db = "university";

  // Create connection
  $con = new mysqli($servername, $username, $password, $db);

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Distance Learning</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link href="css/s_dashboard.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <!-- bootstrap -->
  <?php
      require 'components/header_files.php';
  ?>
</head>
  <body>
  <?php
      require 'components/a_header.php';
  ?>
  <div class="container" id="main-wrapper">
    <center><h2>Offer New Course</h2></center>
    <form action="a_add_course.php" method="post">
        <div class="inner_container" style="padding-bottom: 10px;">
            <div class="form-group">
                <label>Course Code</label>
                <input type="text" class="form-control" name="code" placeholder="Wrire Course Code here" required>
            </div>
            <div class="form-group">
                <label>Course Name</label>
                <input type="text" class="form-control" name="name" placeholder="Wrire Course Name here" required>
            </div>
            <div class="form-group">
                <label for="lec_type">Select Your Program</label>
                <select class="form-control" name="program">
                    <option value="BS-CS">BS-CS</option>
                    <option value="BS-SE">BS-SE</option>
                </select>
            </div>
            <button class="login_button" style="width: 96%; background: #666;" name="add_course_btn" type="submit">Add Course</button>
        </div>
    </form>
  </div>
  <?php
    if(isset($_POST['add_course_btn']))
    {
        $code=$_POST['code'];
        $name=$_POST['name'];
        $program=$_POST['program'];
        $query = "INSERT INTO offered_course(code,name,program) VALUES ('$code','$name','$program')";
        $query_run = mysqli_query($con,$query);
        if($query_run)
        {
            echo "<script type='text/javascript'>alert('Successfully added new course')</script>";
        }
        else
        {
            echo "Error: " . mysqli_error($con);
        }
        
    }
	?>
  </body>
</html>  