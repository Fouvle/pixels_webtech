<?php
$servername='localhost';
$username='root';
$password='';
$dbname = 'sustainify';

function connect_db(){
$conn = mysqli_connect($servername,$username,$password,$dbname);
    // Checking connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}
?>