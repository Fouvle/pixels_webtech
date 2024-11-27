<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="../assets/css/register.css">
</head>
<body>
    <form action="../actions/login_user.php" method="POST" id = "login" class="form-box"> 
        <h2>Log In</h2>
        <div class="input-group">
            <label for="email">Email Address</label>
            <input type="email" placeholder="Enter Email" id="email" name="email">
        </div>
        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter Password">
        </div>
        <button type="submit" class="btn">Log in</button>
        <p class="toggle-text">Create an account here: <a href="view/register.php">Sign Up</a></p>
    </form>
    <script src="../assets/js/login.js"></script>     
</body>
</html>