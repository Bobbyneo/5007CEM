<?php
// Include database configuration
include('config.php');

// Start session (assuming you manage doctor login and sessions)
session_start();

// Check if doctor is logged in or handle authentication as per your system
if (!isset($_SESSION['doctor_id'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

// Retrieve doctor ID from session
$doctor_id = $_SESSION['doctor_id'];

// Prepare SQL query to fetch appointments
$sql = "SELECT id, patient_name, appointment_date, appointment_time FROM appointments WHERE doctor_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $doctor_id);
$stmt->execute();
$stmt->store_result();

// Bind result variables
$stmt->bind_result($appointment_id, $patient_name, $appointment_date, $appointment_time);

// HTML output for appointments table
while ($stmt->fetch()) {
    echo "<tr>";
    echo "<td>$appointment_id</td>";
    echo "<td>$patient_name</td>";
    echo "<td>$appointment_date</td>";
    echo "<td>$appointment_time</td>";
    echo "</tr>";
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
                                                