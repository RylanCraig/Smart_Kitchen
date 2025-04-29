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
$deviceName = $_POST['deviceName'];
$deviceStatus = $_POST['deviceStatus'];
$logDetails = $_POST['logDetails'];

// Prepare & bind
$stmt = $conn->prepare("INSERT INTO Device_Status (DeviceName, Status, LogDetails) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $deviceName, $deviceStatus, $logDetails);

// Execute
if ($stmt->execute()) {
  echo "Device added successfully!";
} else {
  echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
