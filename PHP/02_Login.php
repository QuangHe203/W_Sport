<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../CSS/02_Login.css">
</head>
<body>
            <form>
                <h2>LOG IN</h2>
                <label for="username"><i>User name</i></label>
                <input type="text" id="username" name="username" required placeholder="Enter your user name...">
        
                <label for="password"><i>Password</i> </label>
                <input type="password" id="password" name="password" required placeholder="Enter your Password...">
                <p>You haven't account yet? <a href="../PHP/04_SignUp.php" class="signup"> Sign Up</a></p>
                <button type="submit" onclick="Submit()">Login</button>
            </form>
            <script>
                function Submit() {
                    
                }
            </script>
            
        </div>
    </div>
    
</body>
</html>