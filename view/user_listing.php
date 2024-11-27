<?php
include '/db/config.php';
session_start();
$user_id = $_SESSION['id'];

if (!isset($user_id)) {
    header('Location: login.php');
    exit;
}

if ($_SESSION['userrole']!=='admin') {
    die('You do not have access to this page!');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link rel="stylesheet" href="../user_management.css">
</head>

<body>
    <div class="layout">
        <header class="header">
            <div class="header-left">
                <img src="" alt="Logo" class="logo">
            </div>
            </div>
        </header>

        <div class="content-wrapper">
            <nav class="sidebar">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Browse</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Manage Reviews</a></li>
                    <li><a href="#">Manage Users</a></li>
                    <li><a href="#">Log Out</a></li>
                </ul>
            </nav>
            
            <main class="main">
                <div class="table-container">
                    <table class="users-table">
                        <thead>
                            <tr>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="users-table-body">
                            <!-- Table rows will be populated by JavaScript -->
                        </tbody>
                    </table>
                    
                    <div class="pagination">
                        <button class="btn" id="prev-page" disabled>Previous</button>
                        <span id="page-info">Page 1 of 1</span>
                        <button class="btn" id="next-page">Next</button>
                    </div>
                </div>

                <!-- Delete Confirmation Modal -->
                <div id="delete-modal" class="modal">
                    <div class="modal-content">
                        <h2>Delete User</h2>
                        <p>Are you sure you want to delete this user? This action cannot be undone.</p>
                        <div class="modal-buttons">
                            <button class="btn delete-btn" id="confirm-delete">Delete</button>
                            <button class="btn cancel-btn" id="cancel-delete">Cancel</button>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="../user_management.js"></script>
    <footer class="footer"></footer>
</body>
</html>