<?php

	include 'database.php';
	$orientation = $_POST['orientation'];
	$color = $_POST['color'];
	
	
	if ($color == "del") {
		$sql = "DELETE FROM inventory;";
	}else {
		$sql = "INSERT INTO inventory (rowN,columnN,color, orientation) VALUES (0,0,'$color','$orientation')";
	}
	
	if ($conn->query($sql) != TRUE) {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	
?>