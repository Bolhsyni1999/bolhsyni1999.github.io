<?php
// Connect to the MySQL database
$mysqli = new mysqli("localhost", "username", "password", "database_name");

// Check connection
if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}

// Get form data
$full_name = $_POST["full_name"];
$email = $_POST["email"];
$message = $_POST["message"];

// Insert form data into the database
$sql = "INSERT INTO contact_us (full_name, email, message) VALUES (?, ?, ?)";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("sss", $full_name, $email, $message);
$stmt->execute();
$stmt->close();

// Close database connection
$mysqli->close();

// Redirect to thank you page
header("Location: thank_you.html");
exit();
?>
