<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['role'] != 'doctor') {
    header('Location: login.html');
    exit;
}

echo "Welcome to the Doctor Dashboard, " . $_SESSION['username'];
?>
