<?php
// Start session
session_start();

// Check if session variables exist
if (isset($_SESSION['doctor'], $_SESSION['appointmentDate'], $_SESSION['appointmentTime'])) {
    $doctor = $_SESSION['doctor'];
    $appointmentDate = $_SESSION['appointmentDate'];
    $appointmentTime = $_SESSION['appointmentTime'];
} else {
    // Redirect to the booking page if session variables are not set
    header("Location: book_appointment.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="appointment.css"/>
    <title>Appointment Booked Successfully</title>
</head>
<body>
    <header>
      
    </header>
    <nav>
        <a href="http://localhost/5007CEM/homepage.html">Home</a>
        <a href="http://localhost/5007CEM/Doctor.html">Doctors</a>
        <a href="http://localhost/5007CEM/About.html">About Us</a>
        <a href="http://localhost/5007CEM/Contact.html">Contact</a>
        <div class="auth-buttons">
            <a href="http://localhost/5007CEM/Login.html" class="button">Login</a>
            <a href="http://localhost/5007CEM/register.html" class="button">Register</a>
        </div>
    </nav>

    <div class="content">
        <h1>Appointment Booked Successfully</h1>
        <p>Your appointment with <?php echo htmlspecialchars($doctor); ?> on <?php echo htmlspecialchars($appointmentDate); ?> at <?php echo htmlspecialchars($appointmentTime); ?> has been successfully booked.</p>
        <a href="http://localhost/5007CEM/homepage.html">Back to Home</a>
    </div>
    <br><br>
    <footer>
        &copy; 2024 Bobbyneo Hospital. All rights reserved.
    </footer>

    <!-- Clear session variables after displaying -->
    <?php
    unset($_SESSION['doctor']);
    unset($_SESSION['appointmentDate']);
    unset($_SESSION['appointmentTime']);
    ?>
</body>
</html>
