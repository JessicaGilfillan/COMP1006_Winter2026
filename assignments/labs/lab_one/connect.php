<?php
// connect.php
// Creates a PDO connection to the database

// Database connection settings
$host = "localhost";
$dbname = "lab_one";       // must match your database name in XAMPP
$user = "root";       // default XAMPP username
$pass = "";     // default XAMPP password is empty

try {
    // Create new PDO connection
    $db = new PDO("mysql:host=$host;port=3307;dbname=$dbname;charset=utf8", $user, $pass);
    // Set error mode to exception for easier debugging
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully"; // optional for testing
} catch (PDOException $e) {
    // Display error message if connection fails
    echo "Database connection failed: " . $e->getMessage();
    exit;
}
