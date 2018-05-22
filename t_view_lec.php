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
        padding-left: 15px;
    }

    td{
        color: #333;
    }

    .back-btn{
        background: #ff831f;
        padding: 5px;
        color:#fff;
        border-radius: 5px;
    }

    iframe{
        border: 2px solid #ccc;
    }
  </style>
</head>
  <body>
    <?php
        require 'components/t_header.php';
    ?>

    <?php
        $row;
        if (isset($_SESSION["lec_id"])) {
            $id = $_SESSION['lec_id'];
            $query = "SELECT * from t_lecture where id='".$id."'";
            $result = mysqli_query($con, $query) or die ( mysqli_error());
            $row = mysqli_fetch_assoc($result);
        }
    ?>

    <div class="container content">
        <a class="back-btn" href="t_lecture_list.php">Back</a>
        <div class="col-sm-12">
            <h2 style="text-align: center; color:#555;">Lecture View</h2>
            <div style="width:500px;margin: 0 auto;">
                <?php
                    $src = $row['file_path'];
                    echo "<iframe src='$src' width='500px' height='450px' frameborder='0'>This is an embedded <a target='_blank' href='https://office.com'>Microsoft Office</a> presentation, powered by <a target='_blank' href='https://office.com/webapps'>Office Online</a>.</iframe>";
                ?>
            </div>
        </div>

        <div class="row" style="padding:0;padding-top: 40px;">
            <h2>Lecture Detail</h2>
            <div class="col-sm-12">
            <table class="table table-hover">
            <tbody>
                <tr>
                    <th scope="row">Lecture ID</th>
                    <td><?php echo $row['id']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Lecture Title</th>
                    <td><?php echo $row['title']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Course Name</th>
                    <td><?php echo $row['course_name']; ?></td>
                </tr>
                <tr>
                    <th scope="row">File Path</th>
                    <td><?php echo $row['file_path']; ?></td>
                </tr>
            </tbody>
            </table>
            </div>
        </div>
        <a href="/final/webrtc/public/?id=<?php echo $row['id']; ?>&type=teacher" style="margin-bottom:20px" class="btn btn-primary btn-block btn-sm">Start Lecture</a>
    </div>
    </div>
  </body>
</html>  
