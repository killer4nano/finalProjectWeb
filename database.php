<?php
$servername = "localhost";
$database = "finalproject";
$username = "faraway";
$password = "killer12";

// Create connection

$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection

if (!$conn) {

    die("Connection failed: " . mysqli_connect_error());

}
?>