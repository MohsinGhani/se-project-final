<?php 
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

    .get-btn{
        width: 120px;
        margin: 0 auto;
    }

    table tr td,table tr th{
        text-align: center;
    }

    h4 strong{
        color: #ff831f;
    }

    .back-btn{
        background: #ff831f;
        padding: 5px;
        color:#fff;
    }
  </style>
</head>
  <body>
  <?php
      require 'components/a_header.php';
  ?>
  <div class="container content">
    <a class="back-btn" href="a_courses.php">Back</a>
    <center>
        <h2>Instructor Information</h2>
    </center><br>

    <h4>Course Name : <strong> <?php echo $_SESSION["course_name"]; ?> </strong></h4>
    <h4>Course Code : <strong> <?php echo $_SESSION["course_code"]; ?> </strong></h4>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Instructor Name</th>
                <th scope="col">Instructor Email</th>
                <th scope="col">Days</th>
                <th scope="col">Timeslote</th>
                <th scope="col">Section</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $query = mysqli_query($con, "SELECT * FROM available_course WHERE course_code='".$_SESSION["course_code"]."'") or die (mysqli_error($dbconnect));
            while ($row = mysqli_fetch_array($query)) {
                echo
                    "<tr>
                        <td>{$row['t_name']}</td>
                        <td>{$row['t_email']}</td>
                        <td>{$row['days']}</td>
                        <td>{$row['time_slot']}</td>
                        <td>{$row['section']}</td>
                    </tr>";
                }
        ?>
        
        </tbody>
    </table>
    
    
  </body>
</html>  