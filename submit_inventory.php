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
$ingredientName = $_POST['ingredientName'];
$quantity = $_POST['quantity'];
$storageLocation = $_POST['storageLocation'];
$expirationDate = $_POST['expirationDate'];
$minThreshold = $_POST['minThreshold'];
$reorderAmount = $_POST['reorderAmount'];

// Prepare & bind
$stmt = $conn->prepare("INSERT INTO Inventory_Data (IngredientName, Quantity, StorageLocation, ExpirationDate, MinThreshold, ReorderAmount) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssdd", $ingredientName, $quantity, $storageLocation, $expirationDate, $minThreshold, $reorderAmount);

// Execute
if ($stmt->execute()) {
  echo "Ingredient added successfully!";
} else {
  echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
