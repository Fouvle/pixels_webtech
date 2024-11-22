<?php
require_once 'db.php'; // Include the database connection

// Fetch Sustainability Criteria
function fetchCriteria($pdo) {
    $stmt = $pdo->query("SELECT * FROM criteria ORDER BY id ASC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Fetch Recognized Certifications
function fetchCertifications($pdo) {
    $stmt = $pdo->query("SELECT * FROM certifications ORDER BY id ASC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$criteria = fetchCriteria($pdo);
$certifications = fetchCertifications($pdo);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sustainability Criteria</title>
  <link rel="stylesheet" href="sustain.css">
</head>
<body>
  <!-- Header -->
  <header class="header">
    <h1>Our Sustainability Criteria</h1>
    <p>Learn how we evaluate and score products based on our comprehensive sustainability framework.</p>
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
    <div class="certifications-grid">
      <?php foreach ($certifications as $certification): ?>
        <div class="certification-item"><?php echo htmlspecialchars($certification['name']); ?></div>
      <?php endforeach; ?>
    </div>
  </section>

  <script src="sustain.js"></script>
</body>
</html>