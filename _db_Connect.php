<?php
// connection file
// server name
$servername = "localhost";
$username = "root";
$password = "";
$db = "system";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


?>