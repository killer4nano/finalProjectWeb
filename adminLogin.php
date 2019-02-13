<?php
	
	session_start();
	if ($_SESSION['logged_in'] == false) {
		header("Location: index.php");
	}
	include 'database.php';
	
	if (isset($_POST['colorOfTop']) && isset($_POST['colorOfBottom'])) {
		$colorOfTop = $_POST['colorOfTop'];
		$colorOfBottom = $_POST['colorOfBottom'];
		
		if ($colorOfTop == "black" || $colorOfTop == "white" || $colorOfTop == "silver" || $colorOfBottom == "black" || $colorOfBottom == "silver" || $colorOfBottom == "white") {
			$sql = "SELECT * from inventory where orientation=1 and color='".$colorOfTop."';";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				// output data of each row
				$row = $result->fetch_assoc();
				$topX = $row["rowN"];
				$topY = $row["columnN"];
				
				$sql = "SELECT * from inventory where orientation=0 and color='".$colorOfBottom."';";
				$result = $conn->query($sql);
				
				if ($result->num_rows > 0) {
					$row = $result->fetch_assoc();
					$bottomX = $row["rowN"];
					$bottomY = $row["columnN"];
					
					$sql = "Insert into orders (topsPositionC, bottomsPositionC, topsPositionR,bottomsPositionR, topsColor, bottomsColor) values (".$topY.",".$topX.",".$bottomY.",".$bottomX.",'".$colorOfTop."','".$colorOfBottom."')";
					if ($conn->query($sql) === TRUE) {
						$sql = "delete from inventory where rowN = ".$topX." and columnN = ".$topY.";";
						if ($conn->query($sql) === TRUE) {
							$sql = "delete from inventory where rowN = ".$bottomX." and columnN = ".$bottomY.";";
							if ($conn->query($sql) === TRUE) {
								echo "Order Placed!";
							}else {
								echo "Error: " . $sql . "<br>" . $conn->error;
							}
							
						}else {
							echo "Error: " . $sql . "<br>" . $conn->error;
						}
					} else {
						echo "Error: " . $sql . "<br>" . $conn->error;
					}
				}else {
					echo "That color of bottom isn't available, Please look at the inventory before ordering.";
				}
					
				
			}else {
				echo "That color of top isn't available, Please look at the inventory before ordering.";
			}
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
	
	<div id="databaseButtons">
			<form method="post" action="logout.php">
		<button id='logOutButton' class='buttonStyleAdd'onclick='logout()'>Logout</button>
	</form><br>
		<button class='buttonStyleAdd'onclick='deleteInv()'>Delete All</button><br><br>
		<button class='buttonStyleAdd'onclick='addBlackBottom()'>Black B</button>
		<button class='buttonStyleAdd'onclick='addBlackTop()'>Black T</button>
		<button class='buttonStyleAdd'onclick='addWhiteBottom()'>White B</button>
		<button class='buttonStyleAdd'onclick='addWhiteTop()'>White T</button>
		<button class='buttonStyleAdd'onclick='addSilverBottom()'>Silver B</button>
		<button class='buttonStyleAdd'onclick='addSilverTop()'>Silver T</button>
	</div>
	

	<div id="selection">
		<form method="post" action="adminLogin.php">
			<select name="colorOfTop">
				<option>---Select Colour Of Top---</option>
				<option value="black">Black</option>
				<option value="white">White</option>
				<option value="silver">Silver</option>
			</select><br>
			<select name="colorOfBottom">
				<option>---Select Colour Of Bottom---</option>
				<option value="black">Black</option>
				<option value="white">White</option>
				<option value="silver">Silver</option>
			</select><br>
			<button id='orderButton' class='buttonStyleAdd'>Place Order!</button>
		</form>
	</div>
	<div id="mainContent">
	</div>
	
	
	
</body> 
</html>




