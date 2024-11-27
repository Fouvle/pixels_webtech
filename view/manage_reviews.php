<?php
include '../db/config.php';
session_start();

// Check if the user is logged in as an admin
if (!isset($_SESSION['user_id']) && $_SESSION['userrole'] !== 'admin') {
    header('Location: login.php');
    exit;
}

// Fetch all reviews
$sql = "
    SELECT 
        r.id AS review_id,
        r.rating,
        r.comment,
        r.created_at,
        u.username AS user_name,
        p.name AS product_name
    FROM reviews r
    JOIN users u ON r.user_id = u.id
    JOIN products p ON r.product_id = p.id
    ORDER BY r.created_at DESC;
";

$stmt = $conn->prepare($sql);
$stmt->execute();
$reviews = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

$sql = "DELETE FROM reviews WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $review_id);

if ($stmt->execute()) {
  echo json_encode(['success' => true]);
} else {
  echo json_encode(['success' => false, 'error' => 'Database error']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Reviews</title>
  <link rel="stylesheet" href="manage_reviews.css">
</head>
<body>
  <div class="container">
    <header class="header">
      <h1>Manage Reviews</h1>
    </header>
    <main>
      <table class="reviews-table">
        <thead>
          <tr>
            <th>Review ID</th>
            <th>User</th>
            <th>Product</th>
            <th>Rating</th>
            <th>Comment</th>
            <th>Date</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($reviews as $review): ?>
            <tr data-review-id="<?php echo $review['review_id']; ?>">
              <td><?php echo htmlspecialchars($review['review_id']); ?></td>
              <td><?php echo htmlspecialchars($review['user_name']); ?></td>
              <td><?php echo htmlspecialchars($review['product_name']); ?></td>
              <td><?php echo htmlspecialchars($review['rating']); ?></td>
              <td><?php echo htmlspecialchars($review['comment']); ?></td>
              <td><?php echo htmlspecialchars($review['created_at']); ?></td>
              <td>
                <button class="delete-btn">Delete</button>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </main>
    <footer>
      <p>&copy; 2024 Admin Panel</p>
    </footer>
  </div>
  <script src="manage_reviews.js"></script>
</body>
</html>
