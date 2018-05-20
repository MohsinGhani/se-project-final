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
                    $course_id = $row['id'];
                    $isEnrolledQuery = "SELECT * from student_course where course_id='".$course_id."'";
                    $result = mysqli_query($con, $isEnrolledQuery) or die ( mysqli_error());
                    $course = mysqli_fetch_assoc($result);
                    if( $course['course_id'] == $row['id']){

                    }else{
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
                    
                    }
            ?>
            <?php
                if(isset($_POST['add_btn'])) {
                    $id = $_POST['id'];
                    $s_email = $_SESSION["email"];
                    $isSlotFree = true;
                    
                    $query = "SELECT * from available_course where id='".$id."'";
                    $result = mysqli_query($con, $query) or die ( mysqli_error());
                    $currentCourse = mysqli_fetch_assoc($result);
                    
                    $query1 = mysqli_query($con, "SELECT * FROM student_course WHERE s_email='".$s_email."'") or die (mysqli_error($dbconnect));
                    while ($row = mysqli_fetch_array($query1)) {
                        $course_id = $row['course_id'];
                        $query = "SELECT * from available_course where id='".$course_id."'";
                        $result = mysqli_query($con, $query) or die ( mysqli_error());
                        $course = mysqli_fetch_assoc($result);
                        if($course['course_code'] == $currentCourse['course_code'] && $course['time_slot'] == $currentCourse['time_slot'] && $course['days'] == $currentCourse['days'] && $course['section'] == $currentCourse['section']){
                            $isSlotFree = false;
                        }
                    }

                    if($isSlotFree){
                        $insertQuery = "INSERT INTO student_course(s_email,course_id) VALUES ('$s_email','$id')";
                        $query_run = mysqli_query($con,$insertQuery);
                        if($query_run)
                        {
                          echo '<script type="text/javascript">alert("Course has been successfully added")</script>';
                        }
                        else
                        {
                          echo "Error: " . mysqli_error($con);
                        }
                      }else{
                        echo '<script type="text/javascript">alert("You have already enrolled")</script>';
                      }
                }
            ?>
            </tbody>
        </table>
    </div>
    </body>
</html>  
