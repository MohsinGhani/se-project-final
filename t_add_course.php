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
  <link href="css/t_dashboard.css" rel="stylesheet">
  <!-- bootstrap -->
  <?php
      require 'components/header_files.php';
  ?>
  
</head>
  <body>
  <?php
      require 'components/t_header.php';
  ?>

  <div class="form_container">
    <center>
        <h2>Offer Course</h2>
    </center>
    <form action="t_add_course.php" method="post">
				<div class="form-group">
            <label for="lec_type">Select Course</label>
            <select class="form-control" name="course_name">
              <?php
                $query = mysqli_query($con, "SELECT * FROM offered_course") or die (mysqli_error($dbconnect));
                while ($row = mysqli_fetch_array($query)) {
                  echo "<option value='".$row['name']."'>".$row['name']."</option>";
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="lec_type">Select Section</label>
            <select class="form-control" name="section">
              <option value="A">A</option>
              <option value="B">B</option>
            </select>
        </div>

        <div class="form-group">
            <label for="lec_type">Select Lecture Days</label>
            <select class="form-control" name="days">
              <option value="Mon - Wed - Fri">Mon - Wed - Fri</option>
              <option value="Tue - Thu - Sat">Tue - Thu - Sat</option>
            </select>
        </div>

        <div class="form-group">
            <label for="lec_type">Select Time Slot</label>
            <select class="form-control" name="time_slot">
              <option value="1 to 2">1 to 2</option>
              <option value="2 to 3">2 to 3</option>
              <option value="3 to 4">3 to 4</option>
              <option value="4 to 5">4 to 5</option>
              <option value="5 to 6">5 to 6</option>
              <option value="6 to 7">6 to 7</option>
              <option value="7 to 8">7 to 8</option>
              <option value="8 to 9">8 to 9</option>
              <option value="9 to 10">9 to 10</option>
              <option value="10 to 11">10 to 11</option>
              <option value="11 to 12">11 to 12</option>
              <option value="12 to 13">12 to 13</option>
              <option value="13 to 14">13 to 14</option>
              <option value="14 to 15">14 to 15</option>
              <option value="15 to 16">15 to 16</option>
              <option value="16 to 17">16 to 17</option>
              <option value="17 to 18">17 to 18</option>
              <option value="18 to 19">18 to 19</option>
              <option value="19 to 20">19 to 20</option>
              <option value="20 to 21">20 to 21</option>
              <option value="21 to 22">21 to 22</option>
              <option value="22 to 23">22 to 23</option>
              <option value="23 to 24">23 to 24</option>
            </select>
        </div>

        <div class="form-group">
            <label>Your Email</label>
            <input type="email" class="form-control" name="t_email" value="<?php echo $teacher['email']; ?>" disabled>
        </div>
        <div class="form-group">
            <label>Your Name</label>
            <input type="text" class="form-control" name="t_name" value="<?php echo $teacher['name']; ?>" disabled>
        </div>
				<button name="add_course" class="" type="submit">Add Course</button>
        </form>
    <?php
			if(isset($_POST['add_course']))
			{
				$course_name=$_POST['course_name'];
				$section=$_POST['section'];
				$days=$_POST['days'];
				$time_slot=$_POST['time_slot'];
				$t_email=$teacher['email'];
				$t_name=$teacher['name'];

        $query = "SELECT * from offered_course where name='".$course_name."'";
        $result = mysqli_query($con, $query) or die ( mysqli_error());
        $course = mysqli_fetch_assoc($result);
        $course_code = $course['code'];

        $checkQuery = mysqli_query($con, "SELECT * FROM available_course WHERE t_email='".$t_email."'") or die (mysqli_error($dbconnect));
        $isTeacherFree = true;
        while ($offeredCourses = mysqli_fetch_array($checkQuery)) {
          if($offeredCourses['time_slot'] == $time_slot && $offeredCourses['days'] == $days){
            echo "<p style='text-align: center;color: red;margin-top:5px;'>You can not offered this course because you are not available at this time slot</p>";
            $isTeacherFree = false;
          }
        }

        if($isTeacherFree){
          $insertQuery = "INSERT INTO available_course(course_name,section,days,time_slot,t_email,t_name,course_code) 
          VALUES ('$course_name','$section','$days','$time_slot','$t_email', '$t_name', '$course_code')";
          $query_run = mysqli_query($con,$insertQuery);
          if($query_run)
          {
            echo '<script type="text/javascript">alert("Course has been successfully added")</script>';
          }
          else
          {
            echo "Error: " . mysqli_error($con);
          }
        }

				
      }
    ?>
  </div>
  </body>
</html>  
