<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once '../db/db.php';

$conn = connectDB();;

// Check if the user is logged in and has a valid session
session_start();
if (!isset($_SESSION['id'])) {
    echo "<script>alert('You must be logged in to add items to your wishlist.'); window.location.href = '../login.php';</script>";
    exit();
}

$user_id = $_SESSION['id']; // Get user ID from the session
$product_id = isset($_POST['product_id']) ? $_POST['product_id'] : null; // Get product ID from POST data

if ($product_id === null) {
    echo "<script>alert('Product ID is required.'); window.location.href = '../view/product_page.php';</script>";
    exit();
}

// Prevent SQL injection
$user_id = mysqli_real_escape_string($conn, $user_id);
$product_id = mysqli_real_escape_string($conn, $product_id);

// Check if the product is already in the user's wishlist
$checkQuery = "SELECT id FROM wishlist WHERE user_id = '$user_id' AND product_id = '$product_id'";
$result = mysqli_query($conn, $checkQuery);

if (mysqli_num_rows($result) > 0) {
    // Product already exists in the wishlist
    echo "<script>alert('This product is already in your wishlist.'); window.location.href = '../view/product_page.php';</script>";
    exit();
}

// Insert the product into the user's wishlist
$query = "INSERT INTO wishlist (user_id, product_id, created_at) VALUES ('$user_id', '$product_id', NOW())";
$insertion = mysqli_query($conn, $query);
var_dump($insertion);
exit();

if ($insertion) {
    echo "<script>alert('Product added to your wishlist!'); window.location.href = '../view/product_page.php';</script>";
} else {
    echo "<script>alert('Failed to add product to wishlist. Please try again.'); window.location.href = '../view/product_page.php';</script>";
}
var_dump($insertion);
exit();
?>
