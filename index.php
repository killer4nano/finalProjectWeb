<?php
	session_start();
	
	include 'database.php';
	
	
	
	
	if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
		header("Location: adminLogin.php");
	}
	
	if (isset($_POST['username']) && isset($_POST['password'])) {
		
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$sql = "SELECT * from users where username='$username' and  password='$password'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$_SESSION['logged_in'] = true;
			header("Location: adminLogin.php");
			
		}else {
			alert("Wrong username or password");
		}
	}
	
	function alert($msg) {
		echo "<script type='text/javascript'>alert('$msg');</script>";
	}
	
	
?>

<!DOCTYPE html> 
<html lang="en-us"> 
  
<link rel = "stylesheet"
   type = "text/css"
   href = "stylesheet.css" />  
   
<head> 
<meta charset="utf-8"> 
<title>ATMN Project</title> 


<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<script src="javascripts/jscript.js"></script>

</head> 



<body> 
<button id='guestLogin' class='buttonStyleAdd' onclick="window.location='guestLogin.php'">Guest Access</button>
	<div id="login"> 
		<form method="post" action="index.php">
			USER: <input type="text" name="username"><br><br>
			PASS: <input type="password" name="password"><br><br>
			<button id='loginButton' class='buttonStyleAdd'>Login</button><br><br>		
		</form>
			
	</div>
	
	
</body> 
</html>





