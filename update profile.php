<?php
// Include database configuration file
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    session_start();
    $doctor_id = $_SESSION['doctor_id']; // Replace with actual session variable name

    // Prepare and bind
    $stmt = $conn->prepare("UPDATE doctors SET name = ?, phone = ?, email = ? WHERE id = ?");
    $stmt->bind_param("sssi", $name, $phone, $email, $doctor_id);

    // Execute the statement
    if ($stmt->execute()) {
        // Close statement
        $stmt->close();
        // Redirect to doctor dashboard with success message
        header("Location: doctor dashboard.php?status=success");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
