<?php
  session_start();
?>

<?php 
  $servername = "localhost";
  $username = "root";
  $password = "";
  $db = "university";
  // Create connection
  $con = new mysqli($servername, $username, $password, $db);

  $email = $_SESSION["email"];
  $type = $_SESSION["type"];
  $query = "SELECT * from teacher where email='".$email."'";
  $result = mysqli_query($con, $query) or die ( mysqli_error());
  $teacher = mysqli_fetch_assoc($result);
?>

<header class="main__header" style="margin-top: -16px;">
  <div class="container">
    <nav class="navbar navbar-default" role="navigation"> 
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <h1 class="navbar-brand"><a href="#">Distance Learning</a></h1>
      </div>
      
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-right navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Lecture</a>
            <ul class="dropdown-menu">
              <li><a href="t_create_lecture.php">Make Lecture</a></li>
              <li><a href="t_lecture_list.php">Lecture List</a></li>
            </ul>
          </li>
          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Course</a>
            <ul class="dropdown-menu">
              <li><a href="t_add_course.php">Offer Course</a></li>
              <li><a href="t_dashboard.php">My Offered Courses</a></li>
            </ul>
          </li>
          <li class="active"><a href="index.php">Logout</a></li>
        </ul>
      </div>
      <!-- /.navbar-collapse --> 
    </nav>
  </div>
</header>