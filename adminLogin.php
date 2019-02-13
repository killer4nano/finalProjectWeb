<?php
	
	session_start();
	if ($_SESSION['logged_in'] == false) {
		header("Location: index.php");
	}
	include 'database.php'
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
	
	<div id="databaseButtons">
			<form method="post" action="logout.php">
		<button id='loginButton' class='buttonStyleAdd'onclick='logout()'>Logout</button>
	</form><br>
		<button class='buttonStyleAdd'onclick='deleteInv()'>Delete All</button><br><br>
		<button class='buttonStyleAdd'onclick='addBlackBottom()'>Black B</button>
		<button class='buttonStyleAdd'onclick='addBlackTop()'>Black T</button>
		<button class='buttonStyleAdd'onclick='addWhiteBottom()'>White B</button>
		<button class='buttonStyleAdd'onclick='addWhiteTop()'>White T</button>
		<button class='buttonStyleAdd'onclick='addSilverBottom()'>Silver B</button>
		<button class='buttonStyleAdd'onclick='addSilverTop()'>Silver T</button>
	</div>
	

	
	<div id="mainContent">
	</div>
	
	
</body> 
</html>




