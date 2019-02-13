<?php
	include 'database.php';
	$blackTops = 0;
	$blackBottoms = 0;
	$whiteBottoms = 0;
	$whiteTops = 0;
	$silverTops = 0;
	$silverBottoms = 0;
	$sql = "SELECT * from inventory";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			if($row["orientation"] == 1) {
				if($row["color"] == "black") {
					$blackTops += 1;
				}else if($row["color"] == "silver") {
					$silverTops += 1;
				}else if($row["color"] == "white") {
					$whiteTops += 1;
				}
			}else {
				if($row["color"] == "black") {
					$blackBottoms += 1;
				}else if($row["color"] == "silver") {
					$silverBottoms += 1;
				}else if($row["color"] == "white") {
					$whiteBottoms += 1;
				}
			}
		}
	}
	echo "<p>BLACK TOPS: " . $blackTops . "<br>"
		. "BLACK BOTTOMS: " . $blackBottoms . "<br>" 
		. "WHITE TOPS: " . $whiteTops . "<br>" 
		. "WHITE BOTTOMS: " . $whiteBottoms . "<br>" 
		. "SILVER TOPS: " . $silverTops . "<br>"
		. "SILVER BOTTOMS: " . $silverBottoms . "</p>"
?>