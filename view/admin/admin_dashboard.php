<?php
include '../db/db.php';

session_start();
if ($_SESSION['userrole'] != 'admin') {
    
    header('Location: ../user_dashboard.php');
    exit();
}

?>
  
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Administrator Dashboard</title>
  <link rel="stylesheet" href="../../assets/css/admin.css">
</head>
<body>
  <div class="container">
    <!-- Sidebar -->
    <div class="sidebar">
      <div class="profile">
        <img src="https://via.placeholder.com/50" alt="Profile Image" class="profile-image">
        <h3><?php echo $fname; ?></h3>
      </div>
      <ul class="menu">
        <li><a href="../../index.php">Home</a></li>
        <li><a href="../../view/product_search.php">Products</a>
        <li><a href="../../view/about.php">About Us</a></li>
        <li><a href="../../view/user_listing.php">User Management</a></li>
        <li><a href="../../view/manage_reviews.php">Manage Reviews</a></li>
        <li><a href="../../actions/logout.php">Log Out</a></li>
      </ul>
    </div>
    
    <!-- Main Content -->
    <div class="main-content">
      <div class="dashboard-header">
        <h2>Dashboard</h2>
      </div>
      <div class="activity-chart">
        <h3>Activity</h3>
        <div class="chart-controls">
          <button class="today">Today</button>
          <select class="week-dropdown">
            <option>Week</option>
            <option>Month</option>
          </select>
        </div>
        <div class="chart-placeholder">Chart Placeholder</div>
      </div>
      <div class="statistics-section">
        <div class="visits">
          <h3>Visits</h3>
          <div class="circular-stats">
            <div class="circle">256<br><span>users</span></div>
            <div class="circle">681<br><span>views</span></div>
          </div>
        </div>
        <div class="statistics">
          <h3>Statistics</h3>
          <div class="bar-chart-placeholder">Bar Chart Placeholder</div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
