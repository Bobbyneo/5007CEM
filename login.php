<?php
session_start();

// Include database configuration file
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and bind
    $stmt = $conn->prepare("SELECT id, username, password, role FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);

    // Execute the statement
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Bind the result
        $stmt->bind_result($id, $db_username, $db_password, $role);
        $stmt->fetch();

        // Verify the password
        if (password_verify($password, $db_password)) {
            // Store session variables
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $db_username;
            $_SESSION['id'] = $id;
            $_SESSION['role'] = $role;

            // Redirect based on role
            if ($role == 'patient') {
                header("Location: homepage.html");
            } else if ($role == 'doctor') {
                header("Location: doctor dashboard.php");
            }
        } else {
            echo "Invalid password.";
             header("Location: homepage.html");
        } echo 
             header("Location: doclogin.html");
        
    } else {
        echo "No user found with that username.";
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
