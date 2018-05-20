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
</head>
  <body>
  <?php
      require 'components/t_header.php';
  ?>

  <?php
    $checkQuery = mysqli_query($con, "SELECT * FROM available_course WHERE t_email='".$teacher['email']."'") or die (mysqli_error($dbconnect));
    while ($offeredCourses = mysqli_fetch_array($checkQuery)) {
      echo $offeredCourses['course_name'];
    }
  ?>
  </body>
</html>  
