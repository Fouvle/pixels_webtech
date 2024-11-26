<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/login.css">
</head>
<body>
    <div class="login-container">
        <form action="login.php" method="POST" class="login-form">
            <label for="email"><b>Email:</b></label><br>
            <input type="text" id="email" name="email" placeholder="Enter Email"><br>
            
            <label for="pwd"><b>Password:</b></label><br>
            <input type="password" id="pwd" name="password" placeholder="Password"><br><br>
            
            <input type="checkbox" id="remember" name="remember" value="Remember me">
            <label for="remember"><b>Remember me</b></label><br><br>
            
            <input type="submit" value="Login"><br><br>
            <p>Don't have an account? <a href="register.php">Sign Up</a></p>
        </form>
    </div>
    <script src="login.js"></script>
</body>
</html>
<!-- /*Reference :W3 schools -->
