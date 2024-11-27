<?php
include '../db/config.php';
session_start();

// Check if user is admin
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    echo json_encode(['success' => false, 'error' => 'Unauthorized']);
    exit;
}

// Get the review ID from the request
$data = json_decode(file_get_contents('php://input'), true);
$review_id = $data['review_id'] ?? null;

if (!$review_id || !filter_var($review_id, FILTER_VALIDATE_INT)) {
    echo json_encode(['success' => false, 'error' => 'Invalid review ID']);
    exit;
}

// Delete the review from the database
$sql = "DELETE FROM reviews WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $review_id);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => 'Database error']);
}
?>
