<?php
  session_start();
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
          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Course</a>
            <ul class="dropdown-menu">
              <li><a href="a_add_course.php">Add Course</a></li>
              <li><a href="a_courses.php">All Courses</a></li>
            </ul>
          </li>
          
          <li class="active"><a href="index.php">Logout</a></li>
        </ul>
      </div>
      <!-- /.navbar-collapse --> 
    </nav>
  </div>
</header>