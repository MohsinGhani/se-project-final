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
  <!-- bootstrap -->
  <?php
      require 'components/header_files.php';
  ?>

  <style>
    .content{
      background: #fff;
      padding: 15px;
      border-radius: 10px;
      box-shadow: 0 2px 6px 0 #ccc;
      margin-bottom: 100px;
      margin-top: 20px;
      border: 3px solid #555;
    }
  </style>
</head>
  <body>
  <?php
      require 'components/s_header.php';
  ?>
    <div class="container content">
      <?php
        // echo "Email is  " . $_SESSION["email"] . ".";
        // echo "type is  " . $_SESSION["type"] . ".";
      ?>
      <h2 style="text-align: center;">Your Schedule</h2>
      <table class="table">
            <thead>
                <tr>
                    <th scope="col">Course Code</th>
                    <th scope="col">Course Name</th>
                    <th scope="col">Section</th>
                    <th scope="col">Days</th>
                    <th scope="col">Timeslot</th>
                    <th scope="col">Teacher Name</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $email = $_SESSION["email"];
                $query = mysqli_query($con, "SELECT * FROM student_course WHERE s_email='".$email."'") or die (mysqli_error($dbconnect));
                while ($row = mysqli_fetch_array($query)) {
                    $course_id = $row['course_id'];
                    $getCourseQuery = "SELECT * from available_course WHERE id='".$course_id."'";
                    $result = mysqli_query($con, $getCourseQuery) or die ( mysqli_error());
                    $course = mysqli_fetch_assoc($result);
                    echo
                        "<tr>
                            <td>{$course['course_code']}</td>
                            <td>{$course['course_name']}</td>
                            <td>{$course['section']}</td>
                            <td>{$course['days']}</td>
                            <td>{$course['time_slot']}</td>
                            <td>{$course['t_name']}</td>
                        </tr>";
                    }
            ?>
            
            </tbody>
        </table>



    </div>
  </body>
</html>  
