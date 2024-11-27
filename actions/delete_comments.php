<?php
session_start();
include '../db/db.php';

$conn = connectDB();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $reviewID = $_POST['reviewID'];

    $stmt = $conn->prepare("DELETE FROM reviews WHERE reviewID = ?");
    $stmt->bind_param("i", $reviewID);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Review deleted successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

?>