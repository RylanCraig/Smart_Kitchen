<?php
$host = "localhost";
$username = "root"; 
$password = "";     
$dbname = "smart_kitchen"; 

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get sensor ID from form
$sensorID = $_POST['sensorID'];

// Prepare and bind
$stmt = $conn->prepare("DELETE FROM Sensor_Readings WHERE SensorID = ?");
$stmt->bind_param("i", $sensorID);

// Execute
if ($stmt->execute()) {
  echo "Sensor deleted successfully!";
} else {
  echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
