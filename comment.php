<?php
// Database connection parameters
$servername = "localhost";  // Your database server
$username = "root";         // Your database username
$password = "";             // Your database password
$dbname = "comment_db";     // Your database name

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle the form submission
if (isset($_POST['submit'])) {
    $username = htmlspecialchars($_POST['username']);
    $comment = htmlspecialchars($_POST['comment']);

    // Prepare and execute the SQL query to insert a new comment
    $stmt = $conn->prepare("INSERT INTO comments (username, comment) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $comment);

    if ($stmt->execute()) {
        // Reload the page to display the new comment
        header("Location: comments.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Retrieve all comments from the database
$sql = "SELECT username, comment, created_at FROM comments ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment Page</title>
</head>
<body>
    <h1>Leave a Comment</h1>

    <!-- Comment Form -->
    <form method="post" action="comments.php">
        <label for="username">Name:</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="comment">Comment:</label><br>
        <textarea id="comment" name="comment" rows="5" cols="40" required></textarea><br><br>
        
        <input type="submit" name="submit" value="Post Comment">
    </form>

    <h2>Comments:</h2>
    <div>
        <?php
        // Display comments if available
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<p><strong>" . htmlspecialchars($row['username']) . "</strong> (" . $row['created_at'] . ")<br>";
                echo htmlspecialchars($row['comment']) . "</p><hr>";
            }
        } else {
            echo "<p>No comments yet. Be the first to comment!</p>";
        }

        // Close the database connection
        $conn->close();
        ?>
    </div>
</body>
</html>
