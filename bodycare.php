<?php
include 'db.php';

// Fetch makeup products from the database
$sql = "SELECT * FROM products WHERE category = 'bodycare' ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sustanify - Makeup</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"> 
</head>
<body class="min-h-screen bg-gray-50">
  <!-- Navigation -->
  <nav class="bg-white shadow-sm">
    <div class="max-w-6xl mx-auto px-4">
      <div class="flex items-center justify-between h-16">
        <div class="flex items-center">
          <svg class="h-8 w-8 text-pink-600">...</svg>
          <span class="ml-2 text-xl font-semibold">Sustanify</span>
        </div>
        <div class="hidden md:flex items-center space-x-6">
          <a href="skincare.php" class="text-gray-600 hover:text-pink-600">Skincare</a>
          <a href="makeup.php" class="text-pink-600 font-semibold">Makeup</a>
          <a href="bodycare.php" class="text-gray-600 hover:text-pink-600">Bodycare</a>
          <a href="haircare.php" class="text-gray-600 hover:text-pink-600">Haircare</a>
          <a href="#" class="text-gray-600 hover:text-pink-600">Brands</a>
          <a href="#" class="text-gray-600 hover:text-pink-600">About</a>
        </div>
      </div>
    </div>
  </nav>

  <!-- Makeup Products -->
  <section class="max-w-6xl mx-auto px-4 py-16">
    <div class="flex justify-between items-center mb-8">
      <h2 class="text-2xl font-bold">Sustainable Bodycare</h2>
      <div class="flex items-center gap-4">
        <button class="flex items-center gap-2 text-gray-600 hover:text-pink-600">
          <svg class="h-4 w-4">...</svg>
          Filter
        </button>
      </div>
    </div>
    <div class="grid md:grid-cols-4 gap-6">
      <?php
      if ($result->num_rows > 0) {
        // Output each makeup product from the database
        while ($row = $result->fetch_assoc()) {
          echo '<a href="product_listing.php?id=' . $row['id'] . '" class="block">';
          echo '<div class="bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow">';
          echo '<div class="aspect-square bg-gray-100 rounded-lg mb-4">';
          echo '<img src="' . $row['image_url'] . '" alt="' . $row['name'] . '" class="w-full h-full object-cover rounded-lg" />';
          echo '</div>';
          echo '<p class="text-sm text-gray-600">' . $row['brand'] . '</p>';
          echo '<h3 class="font-medium">' . $row['name'] . '</h3>';
          echo '<div class="flex items-center gap-1">';
          echo '<svg class="h-4 w-4 fill-yellow-400 text-yellow-400">...</svg>';
          echo '<span class="text-sm text-gray-600">' . $row['rating'] . '</span>';
          echo '</div>';
          echo '<p class="font-medium">$' . $row['price'] . '</p>';
          echo '</div>';
          echo '</a>';
        }
      } else {
        echo '<p>No bodycare products found.</p>';
      }

      // Close the database connection
      $conn->close();
      ?>
    </div>
  </section>

  <script src="bodycare.js"></script>
</body>
</html>