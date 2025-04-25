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

// Get the UserID and PreferenceType to delete
$userID = $_POST['deleteUserID'];
$preferenceType = $_POST['deletePreferenceType'];

// Prepare & bind
$stmt = $conn->prepare("DELETE FROM User_Preferences WHERE UserID = ? AND PreferenceType = ?");
$stmt->bind_param("is", $userID, $preferenceType); 

// Execute
if ($stmt->execute()) {
  echo "User preference deleted successfully!";
} else {
  echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
