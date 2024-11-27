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
    $role = 'regular';
   //echo $hashed_password;

    $checkQuery = "SELECT id FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $checkQuery);
    if (mysqli_num_rows($result) > 0) {
        die('This email is already registered. Please use a different email.');
    }

    $query = "INSERT INTO users (fname, lname, email, password_hash, userrole, created_at)
               VALUES ('$fname', '$lname', '$email', '$hashed_password', '$role', NOW())";
    
    $insertion = mysqli_query($conn, $query);

    if ($insertion) {
         echo "<script>alert('Signup successful!');</script>";
         //redirect to login page
         header("Location: ./../view/login.php");
         exit();
    }
    else{
        echo "<script>alert('Signup failed!');</script>";
        echo "Error: " . mysqli_error($conn);
        //redirect to register page
        header("Location: ./../view/register.php");
        exit();
    }
} 
    
?>
