<?php
$host = 'localhost';  // Your database server (use 'localhost' if it's on the same server)
$username = 'root';   // Database username (use your database username)
$password = '';       // Database password (use your database password)
$dbname = 'sustanify'; // Database name

// Create a connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Optionally, set the character set
$conn->set_charset("utf8");
?>
