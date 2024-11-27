<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Layout</title>
  <link rel="stylesheet" href="../assets/css/usr_dshbrd.css">
</head>
<body>
  <div class="container">
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Profile Section -->
      <div class="profile-section">
        <div class="profile-pic">
          <img src="https://via.placeholder.com/50" alt="Profile Picture">
        </div>
        <h2>username</h2>
      </div>
    
      <!-- Navigation Menu -->
      <ul class="nav-menu">
        <li><a href="../index.php">Home</a></li>
        <li><a href="product_search.php">Products</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="wishlist.php">Wishlist</a></li>
      </ul>
    
      <!-- Logout Button -->
      <a href="./../actions/logout.php" class="logout">Log Out</a>
    </div>

    <!-- Main Content -->
    <main class="main-content">
      <section class="welcome-section">
        <h1>WELCOME!</h1>
        <p>Here are some products that are trending today</p>
        <div class="trending-products">
          <div class="product-placeholder"></div>
        </div>
      </section>

      <section class="wishlist-section">
        <h2>Your Wish List</h2>
        <div class="wishlist-placeholder"></div>
      </section>
    </main>
  </div>
</body>
</html>
