<?php
include('config.php'); // Include your database connection settings

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Insert doctor into the database
    $sql = "INSERT INTO doctors (name, email, phone) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $phone);

    if ($stmt->execute()) {
        echo "Doctor added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>

