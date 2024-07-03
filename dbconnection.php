<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "hospital";

// Create connection
$conn = new mysqli($localhost, $username, $password, $hospital);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
