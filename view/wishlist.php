<?php


require '../db/db.php';
$conn = connectDB();
$sql = "SELECT * FROM products ORDER BY created_at DESC LIMIT 4";
  
  // Using mysqli_query to execute the query
$result = mysqli_query($conn, $sql);

$sqlQuery = "SELECT products.* FROM wishlist 
        INNER JOIN products ON wishlist.product_id = products.productID 
        WHERE wishlist.user_id = ?";

$stmt = $conn->prepare($sqlQuery);
$stmt->bind_param("i", $user_id); // Bind the user ID as an integer
$stmt->execute();
$result = $stmt->get_result();
$wishlist = $result->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Wishlist</title>
    <link rel="stylesheet" href="../assets/css/wishlist.css">
</head>
<body>
    <header class="header">
        <div class="logo">Sustainify</div>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="product_search.php">Products</a></li>
                <li><a href="user_dashboard.php">Dashboard</a></li>
                <li><a href="sustainability_criteria.php">Sustainability Criteria</a></li>
                <li><a href="about.php">About</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>My Wishlist</h1>
        <table class="wishlist-table">
            <thead>
                <tr>
                    <th></th>
                    <th>Product Name</th>
                    <th>Unit Price</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach ($wishlist as $product): ?>
                <tr>
                    <td>
                        <form method="POST" action="../actions/wishlist.php">
                            <input type="hidden" name="remove_product_id" value="<?php echo $product['productID']; ?>">
                            <button type="submit" class="remove-btn">×</button>
                        </form>
                    </td>
                    <td>
                        <div class="product-info">
                            <img src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="<?php echo htmlspecialchars($product['productName']); ?>">
                            <span><?php echo htmlspecialchars($product['productName']); ?></span>
                        </div>
                    </td>
                    <td>€<?php echo number_format($product['price'], 2); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
    <footer class="footer">
    </footer>
</body>
</html>