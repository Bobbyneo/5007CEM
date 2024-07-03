<?php
// Include database configuration file
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user_type = $_POST['user_type'];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO users (username, password, role, phone_number, email) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $username, $hashed_password, $user_type, $phone_number, $email);

    // Execute the statement
    if ($stmt->execute()) {
        echo "User registered successfully.";
        header("Location: login.html");
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
