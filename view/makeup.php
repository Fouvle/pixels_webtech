<?php
  require '../db/db.php';
  $conn = connectDB();
  $sql = "SELECT * FROM products ORDER BY created_at DESC LIMIT 4";
  
  // Using mysqli_query to execute the query
  $result = mysqli_query($conn, $sql);
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
                    <svg class="h-8 w-8 text-pink-600" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z" fill="currentColor"/>
                    </svg>
                    <span class="ml-2 text-xl font-semibold">Sustanify</span>
                </div>
                <div class="hidden md:flex items-center space-x-6">
                    <a href="skincare.php" class="text-gray-600 hover:text-pink-600">Skincare</a>
                    <a href="makeup.php" class="text-pink-600 font-semibold">Makeup</a>
                    <a href="bodycare.php" class="text-gray-600 hover:text-pink-600">Bodycare</a>
                    <a href="haircare.php" class="text-gray-600 hover:text-pink-600">Haircare</a>
                    <a href="about.php" class="text-gray-600 hover:text-pink-600">About</a>
                    <a href="wishlist.php" class="text-gray-600 hover:text-pink-600">Wishlist</a>
                </div>
                <!-- Mobile menu button -->
                <button class="md:hidden" data-mobile-menu>
                    <svg class="h-6 w-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-16 6h16"/>
                    </svg>
                </button>
            </div>
        </div>
        <!-- Mobile menu -->
        <div class="hidden md:hidden flex-col space-y-4 px-4 pb-4" data-mobile-menu-items>
            <a href="skincare.php" class="text-gray-600 hover:text-pink-600">Skincare</a>
            <a href="#" class="text-gray-600 hover:text-pink-600">Bodycare</a>
            <a href="#" class="text-gray-600 hover:text-pink-600">Haircare</a>
            <a href="#" class="text-gray-600 hover:text-pink-600">Brands</a>
            <a href="#" class="text-gray-600 hover:text-pink-600">About</a>
        </div>
    </nav>

    <!-- Makeup Products -->
    <section class="max-w-6xl mx-auto px-4 py-16">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-2xl font-bold">Sustainable Makeup Products</h2>
        </div>
        <div class="grid md:grid-cols-4 gap-6">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<a href="product.php?id=' . $row['productID'] . '" class="block">';
                    echo '<div class="bg-white p-4 rounded-lg shadow-sm">';
                    echo '<div class="aspect-square bg-gray-100 rounded-lg mb-4">';
                    echo '<img src="../assets/' . $row['image_url'] . '" alt="' . $row['name'] . '" class="w-full h-full object-cover rounded-lg" />';
                    echo '</div>';
                    echo '<p class="text-sm text-gray-600">' . $row['brand'] . '</p>';
                    echo '<h3 class="font-medium">' . $row['name'] . '</h3>';
                    echo '<div class="flex items-center gap-1">';
                    echo '<svg class="h-4 w-4 fill-yellow-400 text-yellow-400" viewBox="0 0 20 20">
                            <path d="M10 2l2.5 6h6.5l-5 4.5 2 6.5-6-4.5-6 4.5 2-6.5-5-4.5h6.5z"/>
                          </svg>';
                    echo '<span class="text-sm text-gray-600">' . $row['rating'] . '</span>';
                    echo '</div>';
                    echo '<p class="font-medium">$' . number_format($row['price'], 2) . '</p>';
                    echo '</div>';
                    echo '</a>';
                }
            } else {
                echo '<p class="col-span-4 text-center text-gray-600">No makeup products found.</p>';
            }

            $conn->close();
            ?>
        </div>
    </section>

    <script src="../assets/js/makeup.js"></script>
</body>
</html>