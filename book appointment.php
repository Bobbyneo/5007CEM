<?php
// Start session
session_start();

// Include database configuration file
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $doctor = $_POST['doctor'];
    $appointmentDate = $_POST['appointmentDate'];
    $appointmentTime = $_POST['appointmentTime'];

    // Split the doctor value to get doctor name and specialization
    list($doctorName, $specialization) = explode("|", $doctor);

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO appointments (doctor_name, specialization, appointment_date, appointment_time) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $doctorName, $specialization, $appointmentDate, $appointmentTime);

    // Execute the statement
    if ($stmt->execute()) {
        // Store appointment details in session variables
        $_SESSION['doctor'] = $doctorName;
        $_SESSION['appointmentDate'] = $appointmentDate;
        $_SESSION['appointmentTime'] = $appointmentTime;

        // Close statement
        $stmt->close();
        // Redirect to appointment success page
        header("Location: appointment success.php");
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
