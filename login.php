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
			echo "Wrong username or password";
		}
	}
	
	
?>