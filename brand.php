<?php
include 'db.php';

if (isset($_GET['brand'])) {
    $brand = $_GET['brand'];

    // Fetch products for the selected brand
    $stmt = $pdo->prepare("SELECT product_name, description, price, sustainability_score, effectiveness_score FROM products WHERE brand_name = :brand");
    $stmt->execute(['brand' => $brand]);
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($brand); ?> Products</title>
    <style>
        .products {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            text-align: center;
        }

        .products div {
            border: 1px solid #ddd;
            padding: 10px;
        }
    </style>
</head>
<body>

    <h1><?php echo htmlspecialchars($brand); ?> Products</h1>
    <section class="products">
        <?php foreach ($products as $product): ?>
            <div>
                <h3><?php echo htmlspecialchars($product['product_name']); ?></h3>
                <p><?php echo htmlspecialchars($product['description']); ?></p>
                <p>Price: $<?php echo htmlspecialchars($product['price']); ?></p>
                <p>Sustainability Score: <?php echo htmlspecialchars($product['sustainability_score']); ?></p>
                <p>Effectiveness Score: <?php echo htmlspecialchars($product['effectiveness_score']); ?></p>
            </div>
        <?php endforeach; ?>
    </section>

    <a href="index.html">Back to Skincare Brands</a>

</body>
</html>