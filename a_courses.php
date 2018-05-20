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
  </style>
</head>
  <body>
  <?php
      require 'components/a_header.php';
  ?>
  <div class="container content">
    <center><h2>All Course</h2></center>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Course Code</th>
                <th scope="col">Course Name</th>
                <th scope="col">Program</th>
                <th scope="col">Instructor</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $query = mysqli_query($con, "SELECT * FROM offered_course") or die (mysqli_error($dbconnect));
            while ($row = mysqli_fetch_array($query)) {
                echo
                    "<tr>
                        <td>{$row['code']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['program']}</td>
                        <td style='display: flex'>
                            <div style='width: 120px; margin: 0 auto;'>
                                <form action='a_courses.php' method='post'>
                                    <input type='hidden' name='code' value='{$row['code']}'/>
                                    <input type='hidden' name='name' value='{$row['name']}'/>
                                    <input type='submit' name='get_teach_btn' class='btn get-btn btn-primary btn-sm' value='Instructor Info' />
                                </form>
                            </div>
                        </td>
                    </tr>";
                }

            if(isset($_POST['get_teach_btn']))
            {
                $_SESSION["course_code"] = $_POST['code'];
                $_SESSION["course_name"] = $_POST['name'];
                echo '<script type="text/javascript">window.location.assign("a_instructor_info.php");</script>';
            }
        ?>
        
        </tbody>
    </table>
    
    
  </body>
</html>  