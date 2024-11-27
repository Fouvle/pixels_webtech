<?php
  require '../db/db.php';
  $conn = connectDB();
  $sql = "SELECT * FROM products ORDER BY created_at DESC LIMIT 4";
  
  // Using mysqli_query to execute the query
  $result = mysqli_query($conn, $sql);

  $query = "SELECT cname FROM recognized_certifications";
  $result = mysqli_query($conn, $query);

  $certifications = [];
  while ($row = mysqli_fetch_assoc($result)) {
      $certifications[] = $row;  
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sustainability Criteria</title>
  <link rel="stylesheet" href="../assets/css/sc.css">
</head>
<body>
  <!-- Header -->
  <header class="header">
    <h1>Our Sustainability Criteria</h1>
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
          <a href="index.php" class="text-gray-600 hover:text-pink-600">Home</a>
          <a href="skincare.php" class="text-gray-600 hover:text-pink-600">Skincare</a>
          <a href="makeup.php" class="text-gray-600 hover:text-pink-600">Makeup</a>
          <a href="bodycare.php" class="text-gray-600 hover:text-pink-600">Bodycare</a>
          <a href="haircare.php" class="text-gray-600 hover:text-pink-600">Haircare</a>
          <a href="about.php" class="text-gray-600 hover:text-pink-600">About</a>
        </div>
      </div>
    </div>
  </nav>
  </header>

  <!-- Overview Card -->
  <section class="overview-card">
    <div class="card">
      <h2>How Scoring Works</h2>
      <p>Products are evaluated across multiple key categories, with each category contributing to the final sustainability score.</p>
    </div>
  </section>

  <!-- Criteria Navigation -->
  <nav class="criteria-nav">
    <?php foreach ($criteria as $criterion): ?>
      <button class="tab-button" onclick="showTab('<?php echo strtolower(str_replace(' ', '-', $criterion['name'])); ?>')">
        <?php echo htmlspecialchars($criterion['name']); ?>
      </button>
    <?php endforeach; ?>
  </nav>

  <!-- Criteria Details -->
  <section id="criteria-details">
    <?php foreach ($criteria as $criterion): ?>
      <div id="<?php echo strtolower(str_replace(' ', '-', $criterion['name'])); ?>" class="tab-content">
        <h3><?php echo htmlspecialchars($criterion['name']); ?></h3>
        <p><?php echo htmlspecialchars($criterion['weight']); ?>% of total score</p>
        <p><?php echo nl2br(htmlspecialchars($criterion['details'])); ?></p>
      </div>
    <?php endforeach; ?>
  </section>

  <!-- Certification Partners -->
  <section class="certifications">
    <h2>Recognized Certifications</h2>
    <p>We work with leading sustainability certification bodies to ensure our criteria align with global standards.</p>
    <!-- Display Recognized Certifications -->
    <div class="certification-list">
      <?php foreach ($certifications as $certification): ?>
        <div class="certification-item"><?php echo htmlspecialchars($certification['cname']); ?></div>
      <?php endforeach; ?>
    </div>
  </section>

  <script src="../assets/js/sc.js"></script>
</body>
</html>