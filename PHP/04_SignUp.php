<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../CSS/04_SignUp.css">
</head>
<body>
            <form>
                <h2>Sign Up</h2>
                <label for="username"><i>User name</i></label>
                <input type="text" id="username" name="username" required placeholder="Enter your user name...">

                <label for="name"><i class="edit">Name</i></label>
                <input type="text" id="name" name="name" required placeholder="Enter your  name...">

                <label for="email"><i class="edit">Email</i></label>
                <input type="text" id="email" name="email" required placeholder="Enter your  email...">

                <label for="password"><i>Password</i> </label>
                <input type="password" id="password" name="password" required placeholder="Enter your Password...">

                <p>You have already account? <a href="../PHP/02_Login.php" class="signup">Login</a></p>

                <button type="submit" onclick="Sbmit()">Sign Up</button>
                <script>
                    function Sbmit() {
                        
                    }
                </script>

            </form>
            
        </div>
    </div>
    
</body>
</html>