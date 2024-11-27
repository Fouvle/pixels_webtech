<?php
session_start();
include '../db/db.php';

$conn = connectDB();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id= $_SESSION["id"];
    $product_id = $_POST['product_id'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];
    
    $stmt = $conn->prepare("INSERT INTO reviews (product_id, user_id, rating, comment) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iids", $product_id, $user_id, $rating, $comment);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Review added successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>