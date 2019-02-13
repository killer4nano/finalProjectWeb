var myVar = setInterval(myTimer, 200);

function deleteInv() {
	$.post("addPieces.php", {orientation: 0, color: "del"},function(data) {
		console.log(data);
	});
}

function addBlackBottom() {
	$.post("addPieces.php", {orientation: 0, color: "black"},function(data) {
		console.log(data);
	});
}


function addBlackTop() {
	$.post("addPieces.php", {orientation: 1, color: "black"},function(data) {
		console.log(data);
	});
}

function addWhiteBottom() {
	$.post("addPieces.php", {orientation: 0, color: "white"},function(data) {
		console.log(data);
	});
}


function addWhiteTop() {
	$.post("addPieces.php", {orientation: 1, color: "white"},function(data) {
		console.log(data);
	});
}
function addSilverBottom() {
	$.post("addPieces.php", {orientation: 0, color: "silver"},function(data) {
		console.log(data);
	});
}


function addSilverTop() {
	$.post("addPieces.php", {orientation: 1, color: "silver"},function(data) {
		console.log(data);
	});
}
function myTimer() {
	
	$("#mainContent").load("getNumberOfBoxes.php");
}

