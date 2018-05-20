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
<link rel="stylesheet" href="css/style.css">
<title>Distance Learning</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- bootstrap -->
	<?php
        require 'components/header_files.php';
    ?>
</head>
<body style="background-color:#bdc3c7; margin-top:-17px;">
	<!-- include header -->
	<?php
        require 'components/unauth_header.php';
    ?>
	<div id="main-wrapper">
	<center><h2>Teacher Login</h2></center>
		<form action="t_login.php" method="post">
		
			<div class="inner_container" style="padding-bottom: 10px;">
				<label><b>Teacher Email</b></label>
				<input type="email" placeholder="Enter Your Email" name="email" required>
				<label><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="password" required>
				<input type="hidden" class="form-control" name="type" value="teacher" required>
				<button class="login_button" style="width: 96%; background: #666;" name="login" type="submit">Login</button>
			</div>
		</form>

		<?php
			if(isset($_POST['login']))
			{
				$email=$_POST['email'];
				$password=$_POST['password'];
				$type=$_POST['type'];

				$query = "SELECT * FROM `teacher` WHERE email = '$email' AND password = '$password' ";
				//echo $query;
				$query_run = mysqli_query($con,$query);
				//echo mysql_num_rows($query_run);
				if($query_run)
				{
					if(mysqli_num_rows($query_run)>0)
					{
						$_SESSION["email"] = $email;
						$_SESSION["type"] = $type;
						header( "Location: t_dashboard.php");
					}
					else
					{
						echo '<script type="text/javascript">alert("No such User exists. Invalid Credentials")</script>';
					}
				}
				else
				{
					echo '<script type="text/javascript">alert("Database Error")</script>';
				}
			}
			else
			{
			}
		?>
		
	</div>
</body>
</html>