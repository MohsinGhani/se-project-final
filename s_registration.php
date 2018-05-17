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
<title>DL - Student Registration</title>
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
            <p style="margin-top: -10px;">your self as Student</p>
        </center>
		<form action="s_registration.php" method="post">
                <!-- <div class="form-group">
                    <label>Student ID</label>
                    <input type="text" class="form-control" name="id" placeholder="Enter Your Desired ID" required>
                    <small class="form-text text-muted">Write your desired ID here if your entered id will unique then system will accept this.</small>
                </div> -->

                <div class="form-group">
                    <label>Student Name</label>
                    <input type="text" class="form-control" name="username" placeholder="Enter Your Name" required>
                </div>

				<div class="form-group">
                    <label>Student Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter Your Email" required>
                </div>

				<div class="form-group">
                    <label>Student Date of Birth</label>
                    <input type="date" class="form-control" name="dob" placeholder="Enter Your DOB" required>
                </div>

				<div class="form-group">
                    <label for="lec_type">Select Your Program</label>
                    <select class="form-control" name="program">
                        <option value="BS-CS">BS-CS</option>
                        <option value="BS-SE">BS-SE</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter Your Password" required>
                </div>

                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" name="cpassword" placeholder="Enter Your Password Again" required>
                </div>

                <input type="hidden" class="form-control" name="type" value="student" required>

				<button name="register" class="" type="submit">Register</button>
        </form>
    </div>
		
		<?php
			if(isset($_POST['register']))
			{
				$username=$_POST['username'];
				$email=$_POST['email'];
				$dob=$_POST['dob'];
				$program=$_POST['program'];
				$type=$_POST['type'];
				$password=$_POST['password'];
				$cpassword=$_POST['cpassword'];
				if($password==$cpassword)
				{
					// $query = "SELECT * FROM `student` WHERE id='$id' ";
					// echo $query;
					// $query_run = mysqli_query($con,$query);
					// // echo mysql_num_rows($query_run);
					// if(mysqli_num_rows($query_run)>0)
					// {
					// 	echo '<script type="text/javascript">alert("This Username Already exists.. Please try another username!")</script>';
					// }
					// else
					// {
						$query = "INSERT INTO student(name,email,dob,program,password) VALUES ('$username','$email','$dob','$program','$password')";
						$query_run = mysqli_query($con,$query);
							if($query_run)
							{
								echo '<script type="text/javascript">alert("User Registered.. Welcome")</script>';
							}
							else
							{
								echo "Error: " . mysqli_error($con);
							}
					// }

				}
				else
				{
					echo '<script type="text/javascript">alert("Password and Confirm Password do not match")</script>';
				}
				
			}
			else
			{
			}
		?>
	</div>
</body>
</html>