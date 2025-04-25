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
$userID = $_POST['userID'];  // Assuming userID is passed
$preferenceType = $_POST['preferenceType'];
$preferenceValue = $_POST['preferenceValue'];

// Prepare & bind
$stmt = $conn->prepare("INSERT INTO User_Preferences (UserID, PreferenceType, PreferenceValue) VALUES (?, ?, ?)");
$stmt->bind_param("iss", $userID, $preferenceType, $preferenceValue); 
// Execute
if ($stmt->execute()) {
  echo "Preferences saved successfully!";
} else {
  echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
