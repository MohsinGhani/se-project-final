<?php
	session_start();
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "university";

	// Create connection
	$con = new mysqli($servername, $username, $password, $db);
?>
<!DOCTYPE html>
<html>
<head>
<title>DL</title>
<link rel="stylesheet" type="text/css" href="css/s_registration.css">

    <!-- bootstrap -->
    <?php
        require 'components/header_files.php';
    ?>
</head>
<body style="background-color:#bdc3c7;">
    <!-- include header -->
    <?php
        require 'components/unauth_header.php';
    ?>
	<div>
        <div class="s_login_form_container" style="">
        <center>
            <h2>Register</h2>
            <p style="margin-top: -10px;">your self as Teacher</p>
        </center>
		<form action="t_registration.php" method="post">
                <div class="form-group">
                    <label>Teacher Name</label>
                    <input type="text" class="form-control" name="username" placeholder="Enter Your Name" required>
                </div>

				<div class="form-group">
                    <label>Teacher Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter Your Email" required>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter Your Password" required>
                </div>

                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" name="cpassword" placeholder="Enter Your Password Again" required>
                </div>

                <input type="hidden" class="form-control" name="type" value="teacher" required>

				<button name="register" class="" type="submit">Register</button>
        </form>
    </div>
		
		<?php
			if(isset($_POST['register']))
			{
				$username=$_POST['username'];
				$email=$_POST['email'];
				$type=$_POST['type'];
				$password=$_POST['password'];
				$cpassword=$_POST['cpassword'];

				if($password==$cpassword)
				{
						$query = "INSERT INTO teacher(name,email,password) VALUES ('$username','$email','$password')";
						$query_run = mysqli_query($con,$query);
							if($query_run)
							{
								echo '<script type="text/javascript">alert("User Registered.. Welcome")</script>';
							}
							else
							{
								echo "Error: " . mysqli_error($con);
							}
				}
				else
				{
					echo '<script type="text/javascript">alert("Password and Confirm Password do not match")</script>';
				}
				
			}
		?>
	</div>
</body>
</html>