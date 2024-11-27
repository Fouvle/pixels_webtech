<?php
require_once '../db/db.php';

$conn = connectDB();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];

    if (empty($email) || empty($password) || empty($fname) || empty($lname)) {
         die('All fields are required.');
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
         die('Invalid email format.');
   }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
   //echo $hashed_password;
    $conn = connectDB();
    $query = "INSERT INTO users (fname, lname, email, password_hash, userrole, created_at, updated_at)
               VALUES ('$fname', '$lname', '$email', '$hashed_password', '$role', NOW(), NOW())";
    
    $insertion = mysqli_query($conn, $query);

    if ($insertion) {
         echo "<script>alert('Signup successful!');</script>";
         //redirect to login page
         header("Location: login.php");
         exit();
    }
    else{
        echo "<script>alert('Signup failed!');</script>";
        echo "Error: " . mysqli_error($conn);
        //redirect to register page
        header("Location: register.php");
        exit();
    }
} 
    
?>