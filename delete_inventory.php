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

// Get the ingredient ID to delete
$ingredientID = $_POST['ingredientID']; 

// Prepare & bind
$stmt = $conn->prepare("DELETE FROM Inventory_Data WHERE IngredientID = ?");
$stmt->bind_param("i", $ingredientID);

// Execute
if ($stmt->execute()) {
  echo "Inventory item deleted successfully!";
} else {
  echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
