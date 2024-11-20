<?php

// Include the database configuration file to connect to the database
include 'config.php';

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect and trim form data
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    $userrole = 'regular'; // Default role for new users

    // Check for empty fields
    if (empty($fname) || empty($lname) || empty($email) || empty($password) || empty($confirm_password)) {
        die('Please fill in all required fields.');
    }

    // Check if passwords match
    if ($password !== $confirm_password) {
        die('Passwords do not match.');
    }

    // Check if email is already registered
    $stmt = $conn->prepare('SELECT email FROM users WHERE email = ?');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $results = $stmt->get_result();

    if ($results->num_rows > 0) {
        echo '<script>alert("User already registered.");</script>';
        echo '<script>window.location.href = "register.html";</script>';
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Insert the user into the database
    $query = 'INSERT INTO users (first_name, last_name, email, password_hash, role) VALUES (?, ?, ?, ?, ?)';
    $stmt = $conn->prepare($query);

    if (!$stmt) {
        die('Error preparing statement: ' . $conn->error);
    }

    $stmt->bind_param('sssss', $fname, $lname, $email, $hashed_password, $userrole);

    if ($stmt->execute()) {
        header('Location: Login.php');
        exit();
    } else {
        die('Error inserting user: ' . $stmt->error);
    }

    $stmt->close();
}

$conn->close();
?>
