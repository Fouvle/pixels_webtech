<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <link rel="stylesheet" href="../assets/signup.css">
</head>
<body>
	<form action="../actions/register_user.php" method="POST" id = "signup" class="form-box">
		<h2>Sign Up</h2>
		<div class="input-group">
            <label for="fname">First Name</label>
            <input type="text" placeholder="Enter first name" id="fname" name="fname" required>
        </div>
        <div class="input-group">
            <label for="lname">Last Name</label>
            <input type="text" placeholder="Enter last name" id="lname" name="lname" required>
        </div>
        <div class="input-group">
            <label for="username">Username</label>
            <input type="text" placeholder="Enter a username" id="username" name="username" required>
        </div>
        <div class="input-group">
            <label for="email">Email</label>
            <input type="email" placeholder="Enter email" id="email" name="email">
        </div>
        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter Password"required>
        </div>
        <div class="input-group">
            <label for="confirm-password">Confirm Password</label>
            <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm Password" required>
        </div>
        <button type="submit" class="btn">Sign Up</button>
        <p class="toggle-text">Already have an account? <a href="../login.php">Log In</a></p>
    </form>

    <script src="/assets/js/signup.js"></script>
</body>
</html>
