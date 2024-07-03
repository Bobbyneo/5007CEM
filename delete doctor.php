<?php
include('config.php'); // Include your database connection settings

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $doctor_id = $_POST['doctor_id'];

    // Delete doctor from the database
    $sql = "DELETE FROM doctors WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $doctor_id);

    if ($stmt->execute()) {
        echo "Doctor deleted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
