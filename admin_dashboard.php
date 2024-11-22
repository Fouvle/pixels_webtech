<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="admin.css">
</head>
<body>
  <div class="container">
    <!-- Sidebar -->
    <div class="sidebar">
      <div class="profile">
        <img src="https://via.placeholder.com/50" alt="Profile Image" class="profile-image">
        <h3>[insert username]</h3>
      </div>
      <ul class="menu">
        <li><a href="#">Home</a></li>
        <li><a href="#">Product Catalog</a>
        <li><a href="#">About</a></li>
        <li><a href="#">Log Out</a></li>
        <li><a href="#">Settings</a></li>
      </ul>
      <!--
      <div class="categories">
        <h4>Categories</h4>
        <ul>
          <li><span class="circle activity"></span> Activity</li>
          <li><span class="circle posts"></span> Posts</li>
          <li><span class="circle visits"></span> Visits</li>
          <li><span class="circle statistics"></span> Statistics</li>
        </ul>
        <button class="add-category">+ Add Category</button>
      </div>
      -->
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