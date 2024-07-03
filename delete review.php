<?php
include('config.php'); // Include your database connection settings

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $review_id = $_POST['review_id'];

    // Delete review from the database
    $sql = "DELETE FROM reviews WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $review_id);

    if ($stmt->execute()) {
        echo "Review deleted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
