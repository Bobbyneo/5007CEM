<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['role'] != 'patient') {
    header('Location: login.html');
    exit;
}

echo "Welcome to the Patient Dashboard, " . $_SESSION['username'];
?>
