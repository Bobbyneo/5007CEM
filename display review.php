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

$sql = "SELECT reviews.id, reviews.review_text, reviews.review_date, doctors.name as doctor_name 
        FROM reviews 
        JOIN doctors ON reviews.doctor_id = doctors.id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='review-item'>";
        echo "<h4>Review for " . $row['doctor_name'] . "</h4>";
        echo "<p>" . $row['review_text'] . "</p>";
        echo "<p><small>Reviewed on " . $row['review_date'] . "</small></p>";
        echo "</div>";
    }
} else {
    echo "No reviews yet.";
}

$conn->close();
?>
