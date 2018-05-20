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
  <link href="css/s_course_registeration.css" rel="stylesheet">
  <!-- bootstrap -->
  <?php
      require 'components/header_files.php';
  ?>
</head>
  <body>
  <?php
      require 'components/s_header.php';
  ?>
    <div class="container content">
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
                $query = mysqli_query($con, "SELECT * FROM available_course") or die (mysqli_error($dbconnect));
                while ($row = mysqli_fetch_array($query)) {
                    echo
                        "<tr>
                            <td>{$row['course_code']}</td>
                            <td>{$row['course_name']}</td>
                            <td>{$row['section']}</td>
                            <td>{$row['days']}</td>
                            <td>{$row['time_slot']}</td>
                            <td>{$row['t_name']}</td>
                            <td style='display: flex'>
                                <form action='s_course_registeration.php' method='post'>
                                    <input type='hidden' name='id' value='{$row['id']}'/>
                                    <input type='submit' name='add_btn' class='btn btn-secondary btn-sm' value='Add' />
                                </form>
                            </td>
                        </tr>";
                    
                    }
            ?>
            <?php
                if(isset($_POST['add_btn'])) {
                    echo $_POST['id'];
                }
            ?>
            </tbody>
        </table>
    </div>
    </body>
</html>  
