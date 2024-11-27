<?php
require '../db/db.php';
$conn = connectDB();

// Get product ID from URL
$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
// Fetch product details
$sql = "SELECT * FROM products WHERE productID = $product_id";
$result = mysqli_query($conn, $sql);
$product = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($product['productName']); ?> - Sustainify</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-50">
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
          <a href="haircare.php" class="text-gray-600 hover:text-pink-600">Haircare</a>
          <a href="about.php" class="text-gray-600 hover:text-pink-600">About</a>
          <a href="wishlist.php" class="text-gray-600 hover:text-pink-600">Wishlist</a>
        </div>
      </div>
    </div>
  </nav>

    <main class="max-w-6xl mx-auto px-4 py-16 grid md:grid-cols-2 gap-12">
        <!-- Product Image -->
        <div>
            <img src="../assets/<?php echo htmlspecialchars($product['image_url']); ?> "
                 alt="<?php echo htmlspecialchars($product['productName']); ?>" 
                 class="w-full rounded-lg shadow-md">
        </div>

        <!-- Product Details -->
        <div>
            <p class="text-sm text-gray-600"><?php echo htmlspecialchars($product['brand']); ?></p>
            <h1 class="text-3xl font-bold mb-4"><?php echo htmlspecialchars($product['productName']); ?></h1>

            <div class="flex items-center mb-4">
                <div class="flex text-yellow-400">
                    <?php 
                    // Star rating display logic
                    $rating = $product['rating'];
                    for ($i = 1; $i <= 5; $i++) {
                        echo $i <= $rating 
                            ? '★' 
                            : '☆';
                    }
                    ?>
                </div>
                <span class="ml-2 text-gray-600"><?php echo $product['rating']; ?> / 5</span>
            </div>

            <p class="text-2xl font-semibold text-pink-600 mb-6">
                $<?php echo number_format($product['price'], 2); ?>
            </p>

            <div class="mb-6">
                <h3 class="font-bold mb-2">Description</h3>
                <p class="text-gray-700"><?php echo htmlspecialchars($product['description']); ?></p>
            </div>

            <div class="space-y-4">
                <button type="submit" action="./../actions/add_to_wishlist.php" class="w-full border border-pink-600 text-pink-600 py-3 rounded-lg hover:bg-pink-50 transition">
                    Add to Wishlist
                </button>
            </div>
        </div>
        <div class="container">
            <h2>Leave a Comment</h2>
            <form id="comment-form" method="POST" action="">
                <label for="comment-textarea" class="sr-only">Your Comment</label>
                <textarea id="comment-textarea" placeholder="Write your comment here..." required></textarea>
                
                <div class="rating">
                    <label for="rating" class="sr-only">Your Rating</label>
                    <span class="rating-label">Rating (0.0 to 5.0):</span>
                    <input 
                        id="rating" 
                        name="rating" 
                        type="number" 
                        min="0" 
                        max="5" 
                        step="0.1" 
                        placeholder="e.g., 4.5" 
                    />
                </div>

        <div class="btn">
                <div class="btn">
                    <button id="submit" type="submit">Submit</button>
                </div>
            </form>
        </div>
        <div class="comments">
            <h2>Comments</h2>
            <div id="comment-box">
                <!-- User comments will appear here -->
            </div>
        </div>
    </main>

    <script src="../assets/js/product_details.js"></script>
</body>
</html>