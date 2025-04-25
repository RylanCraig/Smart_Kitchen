<?php
$host = "localhost";
$username = "root"; 
$password = "";     
$dbname = "smart_kitchen"; 

// Create connection
$mysqli = new mysqli($servername, $username, $password, $database, $port);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>
