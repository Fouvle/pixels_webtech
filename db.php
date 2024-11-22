<?php
$host = 'localhost';  // Your database server (use 'localhost' if it's on the same server)
$username = 'root';   // Database username (use your database username)
$password = '';       // Database password (use your database password)
$dbname = 'sustanify'; // Database name

function connect_db(){
$conn = mysqli_connect($servername,$username,$password,$dbname);
    // Checking connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}
?>
