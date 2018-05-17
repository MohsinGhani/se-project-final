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
	<center><h2>Admin Login</h2></center>
		<form action="a_login.php" method="post">
		
			<div class="inner_container" style="padding-bottom: 10px;">
				<label><b>Admin Email</b></label>
				<input type="email" placeholder="Enter Your Email" name="email" required>
				<label><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="password" required>

				<input type="hidden" class="form-control" name="type" value="admin" required>
				<button class="login_button" style="width: 96%; background: #666;" name="login" type="submit">Login</button>
			</div>
		</form>
		
		<?php
			if(isset($_POST['login']))
			{
				$email=$_POST['email'];
				$password=$_POST['password'];
				$type=$_POST['type'];
				if($email == 'admin@gmail.com' &&  'admin' == $password){
					header( "Location: a_dashboard.php");
				}
				else{

				}
			}
		?>
		
	</div>
</body>
</html>