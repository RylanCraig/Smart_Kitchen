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

// Get values from form
$sensorType = $_POST['sensorType'];
$readingValue = $_POST['readingValue'];
$deviceID = $_POST['deviceID'];

// Prepare & bind
$stmt = $conn->prepare("INSERT INTO Sensor_Readings (SensorType, ReadingValue, DeviceID) VALUES (?, ?, ?)");
$stmt->bind_param("ssi", $sensorType, $readingValue, $deviceID);

// Execute
if ($stmt->execute()) {
  echo "Sensor reading added successfully!";
} else {
  echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
