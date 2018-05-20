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

    h2{
        color: #ff831f;
    }

    td{
        color: #333;
    }
  </style>
</head>
  <body>
  <?php
      require 'components/t_header.php';
  ?>

    <div class="container content">
        <?php
            echo $_SESSION["lec_id"];
        ?>
    </div>
  </body>
</html>  
