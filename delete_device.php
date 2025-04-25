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

// Get device ID from form
$deviceID = $_POST['deviceID'];

// Prepare and bind
$stmt = $conn->prepare("DELETE FROM Device_Status WHERE DeviceID = ?");
$stmt->bind_param("i", $deviceID);

// Execute
if ($stmt->execute()) {
  echo "Device deleted successfully!";
} else {
  echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
