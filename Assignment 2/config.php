<?php
// Start session in config.php if you want session available everywhere
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Database connection settings
$host = "localhost";
$user = "root";        // Change if your MySQL username is different
$pass = "";            // Change if you have a password set for MySQL
$dbname = "assignment2";

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
