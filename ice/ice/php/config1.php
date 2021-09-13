<?php
$dbhost= "localhost";
$username = "root";
$password = "";
$dbname = "ice-cream";


// Create connection
$conn =  mysqli_connect($dbhost, $username, $password, $dbname) or 
die("Could not connect " . mysqli_error($conn));
?>


