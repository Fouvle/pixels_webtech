<?php
include 'db.php';

// Get product ID from URL
$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch product details
$sql = "SELECT * FROM products WHERE id = $product_id";
$result = $conn->query($sql);
$product = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($product['name']); ?> - Sustanify</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-50">
    <nav class="bg-white shadow-sm">
        <!-- Navigation from previous pages -->
    </nav>

    <main class="max-w-6xl mx-auto px-4 py-16 grid md:grid-cols-2 gap-12">
        <!-- Product Image -->
        <div>
            <img src="<?php echo htmlspecialchars($product['image_url']); ?>" 
                 alt="<?php echo htmlspecialchars($product['name']); ?>" 
                 class="w-full rounded-lg shadow-md">
        </div>

        <!-- Product Details -->
        <div>
            <p class="text-sm text-gray-600"><?php echo htmlspecialchars($product['brand']); ?></p>
            <h1 class="text-3xl font-bold mb-4"><?php echo htmlspecialchars($product['name']); ?></h1>

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
                <button class="w-full bg-pink-600 text-white py-3 rounded-lg hover:bg-pink-700 transition">
                    Add to Cart
                </button>
                <button class="w-full border border-pink-600 text-pink-600 py-3 rounded-lg hover:bg-pink-50 transition">
                    Add to Wishlist
                </button>
            </div>
        </div>
        <section class="comment-section">
            <div class="container">
                <h2>Tell us about your experience</h2>
                <form>
                   <textarea placeholder="Add Your Comment"></textarea>
                   <div class="btn">
                        <input id="submit" type="submit" value="Submit Comment">
                        <button id="clear" type="button">Clear</button>
                    </div>
                </form>
            </div>
            <div class="comments">
               <h2>Comments</h2>
                <div id="comment-box"></div>
            </div>
        </section>
    </main>

    <script src="product_details.js"></script>
</body>
</html>
