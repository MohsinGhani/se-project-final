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
  <center>
        <h2>Your Created Lectures</h2>
    </center>
  <table class="table">
            <thead>
                <tr>
                    <th scope="col">Lecture Title</th>
                    <th scope="col">Course Name</th>
                    <th scope="col">Lecture Type</th>
                    <th scope="col">View</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $email = $_SESSION["email"];
                $query = mysqli_query($con, "SELECT * FROM t_lecture WHERE t_email='".$teacher['email']."'") or die (mysqli_error($dbconnect));
                while ($row = mysqli_fetch_array($query)) {
                    echo
                        "<tr>
                            <td>{$row['title']}</td>
                            <td>{$row['course_name']}</td>
                            <td>{$row['lec_type']}</td>
                            <td>
                            <form action='t_lecture_list.php' method='post'>
                                <input type='hidden' name='id' value='{$row['id']}'/>
                                <input type='submit' name='view_lec' class='btn get-btn btn-primary btn-sm' value='View' />
                            </form>
                            </td>
                        </tr>";
                    }

                    if(isset($_POST['view_lec']))
                    {
                        $_SESSION["lec_id"] = $_POST['id'];
                        echo '<script type="text/javascript">window.location.assign("t_view_lec.php");</script>';
                    }
            ?>
            
            </tbody>
        </table>
      </div>
  </body>
</html>  
