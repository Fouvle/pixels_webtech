<?php
  require '../db/db.php';
  $conn = connectDB();
  $sql = "SELECT * FROM sections";
  
  // Using mysqli_query to execute the query
  $sections = mysqli_query($conn, $sql);
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
<nav class="bg-white shadow-sm">
    <div class="max-w-6xl mx-auto px-4">
      <div class="flex items-center justify-between h-16">
        <div class="flex items-center">
          <svg class="h-8 w-8 text-pink-600" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z" fill="currentColor"/>
          </svg>
          <span class="ml-2 text-xl font-semibold">Sustainify</span>
        </div>
        <div class="hidden md:flex items-center space-x-6">
            <a href="../index.php" class="text-gray-600 hover:text-pink-600">Home</a>
            <a href="skincare.php" class="text-gray-600 hover:text-pink-600">Skincare</a>
            <a href="makeup.php" class="text-gray-600 hover:text-pink-600">Makeup</a>
            <a href="bodycare.php" class="text-gray-600 hover:text-pink-600">Bodycare</a>
            <a href="haircare.php" class="text-gray-600 hover:text-pink-600">Haircare</a>
            <a href="sustainability_criteria.php" class="text-gray-600 hover:text-pink-600">Sustainability Criteria</a>
            <a href="admin/admin_dashboard.php" class="text-gray-600 hover:text-pink-600">Dashboard</a>
        </div>
      </div>
    </div>
  </nav>


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