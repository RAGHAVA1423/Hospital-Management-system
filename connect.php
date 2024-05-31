<?php
$servername = "localhost";
$username = "Raghava"; // Replace with your database username
$password = "2407"; // Replace with your database password
$dbname = "hospital_db"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
