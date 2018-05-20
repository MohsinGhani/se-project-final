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

  <style>
    .content{
      background: #fff;
      width: 60%;
      padding: 15px;
      border-radius: 10px;
      box-shadow: 0 2px 6px 0 #ccc;
      margin-bottom: 100px;
      margin-top: 20px;
      border: 3px solid #555;
    }

    .hidethis{
        display: none;
    }
  </style>
</head>
  <body>
  <?php
      require 'components/t_header.php';
  ?>

  <div class="container">
    <center>
        <h2>Make Lecture</h2>
    </center>
    <script>
        function selectType(){
            var x = document.getElementById("lec_type").value;
            if(x == 'ppt' || x == 'msdoc'){
                document.getElementById("ppt_input").classList.remove('hidethis');
                document.getElementById("doc_input").classList.add('hidethis');
            }else{
                document.getElementById("doc_input").classList.remove('hidethis');
                document.getElementById("ppt_input").classList.add('hidethis');
            }
        }
    </script>

    <div class="container content">
        <div class="row lec-form" id="lec_container">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
            <form enctype="multipart/form-data" action="t_create_lecture.php" method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">Lecture Title</label>
                    <input type="text" name="lec_title" class="form-control" id="lec_title" placeholder="Lecture Title">
                </div>

                <div class="form-group">
                    <label for="lec_type">Lecture Type</label>
                    <select class="form-control" id="lec_type" name="lec_type"  onchange="selectType()">
                        <option value="null">Select Lecture Type</option>
                        <option value="ppt">MS Power Point</option>
                        <option value="msdoc">MS Word</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="lec_type">Select Course</label>
                    <select class="form-control" name="course_name">
                    <?php
                        $query = mysqli_query($con, "SELECT * FROM available_course WHERE t_email='".$teacher['email']."'") or die (mysqli_error($dbconnect));
                        while ($row = mysqli_fetch_array($query)) {
                            echo "<option value='".$row['course_name']."'>".$row['course_name']."</option>";
                        }
                        ?>
                    </select>
                </div>

                <div id="ppt_input" class="hidethis form-group">
                    <label for="ppt_path">Embed Path</label>
                    <input type="text" class="form-control" id="ppt_path" placeholder="Write Embed Path"  name="ppt_path">
                </div>
                <div id="doc_input" class="hidethis form-group">
                    <input type="file" name="uploaded_file"></input>
                </div>

                <div class="form-group">
                    <label>Your Email</label>
                    <input type="email" class="form-control" name="t_email" value="<?php echo $teacher['email']; ?>" disabled>
                </div>
                <div class="form-group">
                    <label>Your Name</label>
                    <input type="text" class="form-control" name="t_name" value="<?php echo $teacher['name']; ?>" disabled>
                </div>

                <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <?php
        if(isset($_POST['submit'])){
            $lec_title = $_POST['lec_title'];
            $lec_type = $_POST['lec_type'];
            $ppt_path = $_POST['ppt_path'];
            $course_name = $_POST['course_name'];
            $t_name = $teacher['name'];
            $t_email = $teacher['email'];
            // $uploaded_file = $_POST['uploaded_file'];
            if($lec_title == ""){
                echo "<script>window.open('index.php?name=Error: Lecture Title is Required','_self')</script>";
            }
            if($lec_type == "null"){
                echo "<script>window.open('index.php?number=Error: Lecture Type is Required','_self')</script>";
            }
            if($course_name == ""){
                echo "<script>window.open('index.php?adress=Error: Course Name is Required','_self')</script>";
            }
            else{
                $path = "uploads/";
                if(!empty($_FILES['uploaded_file'])){
                    $path = $path . basename( $_FILES['uploaded_file']['name']);
                    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
                        // echo "The file ".  basename( $_FILES['uploaded_file']['name']). " has been uploaded";
                    } else{
                        // echo "There was an error uploading the file, please try again!";
                    }
                }
                if($lec_type == "ppt" or $lec_type == "msdoc"){
                    $path = $ppt_path;
                    echo $path;
                }

                $query = "INSERT INTO t_lecture(title,course_name,lec_type,file_path,t_name,t_email) 
                VALUES('$lec_title','$course_name','$lec_type','$path', '$t_name','$t_email')";
                if (mysqli_query($con, $query)) {
                    echo "  <script>
                                alert('Course has been successfully added');
                                window.location.assign('t_lecture_list.php');
                            </script>";
                } else {
                    echo "Error: " . $con . "<br>" . mysqli_error($con);
                }

                mysqli_close($con);
            }
        }
    ?>
  </div>
  </body>
</html>  
