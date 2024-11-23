<?php
// Include the database connection file
include 'db.php';

try {
    // Fetch sections from the database
    $query = $pdo->query("SELECT * FROM sections");
    $sections = $query->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Failed to fetch data: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Sustanify</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="min-h-screen bg-pink-50">
  <!-- Hero Section -->
  <div class="bg-gradient-to-r from-pink-50 to-white py-16">
    <div class="container mx-auto px-4">
      <h1 class="text-4xl font-bold text-pink-900 text-center mb-6">About Sustanify</h1>
      <p class="text-xl text-pink-700 text-center max-w-2xl mx-auto">
        Your trusted companion in making conscious beauty choices.
      </p>
    </div>
  </div>

  <!-- Sections from Database -->
  <div class="container mx-auto px-4 py-12">
    <?php if (!empty($sections)): ?>
      <?php foreach ($sections as $section): ?>
        <div class="bg-white shadow-lg hover:shadow-pink-100 mb-8 p-6">
          <h2 class="text-2xl font-semibold text-pink-900 mb-4">
            <?= htmlspecialchars($section['title']) ?>
          </h2>
          <p class="text-pink-700">
            <?= nl2br(htmlspecialchars($section['content'])) ?>
          </p>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <p class="text-center text-pink-700">No sections found.</p>
    <?php endif; ?>
  </div>

  <!-- Footer -->
  <div class="container mx-auto px-4 py-12 text-center">
    <p class="text-xl font-medium text-pink-700 italic">
      Beauty that cares for you and the planet.
    </p>
  </div>
</body>
</html>