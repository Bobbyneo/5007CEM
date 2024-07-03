<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$doctor_id = $_POST['doctor_id'];
$review_text = $_POST['review_text'];
$review_date = date('Y-m-d');

// Insert review into database
$sql = "INSERT INTO reviews (doctor_id, patient_id, review_text, review_date) VALUES ($doctor_id, 1, '$review_text', '$review_date')"; // Assuming patient_id is 1 for now

if ($conn->query($sql) === TRUE) {
    echo "New review added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
