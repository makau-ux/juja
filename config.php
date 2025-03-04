<<?php
// Database connection settings
$servername = "localhost"; // Change this if using a remote server
$username = "root"; // Change if your database has a different username
$password = ""; // Set your actual password if required
$dbname = "demo"; // Assuming your database is named "demo"

// Create connection
$link = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}
?>
