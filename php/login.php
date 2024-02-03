<?php

session_start();
ob_start();
include "./connectdb.php";
include "./user.php";
if(isset($_POST['login'])&&($_POST['login'])){
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $role = checkuser($user, $pass);
    $_SESSION['role'] = $role;
     // Kiểm tra xem người dùng có đăng nhập hay không
     
    
     if ($role === false) {
        $txt_erro = "Tên đăng nhập hoặc Mật khẩu không đúng";
    } else {
        $_SESSION['role'] = $role;

        // Chuyển hướng dựa trên vai trò của người dùng
        if ($role == 1) {
            header('location: admin.php');
        } elseif ($role == 0) {
            header('location: ../php/profile.php');
        }
    }

}
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn</title>
    <link rel="stylesheet" href="../css/login.css">

</head>
<body>
    <div class="container">
        <div class="container-content">
            <!--title-->
            <div class="title">
                <h1>LOG IN</h1>
            </div>

            <!--Main content-->
            <form action="<?php echo $_SERVER['PHP_SELF']?>" id="form-signup" method="post">
                <div class="input-group">
                    <label for="username">UserName</label>
                    <input class="form-input" type="text" id="username" required="required" placeholder="Enter your Username" name="username">
                </div>
                
                <div class="input-group">
                    <label for="password">Password</label>
                    <input class="form-input" type="password" id="password" required="required" placeholder="Enter your password" name="password">
                </div>

                <div class="text-account">
                    <span class="text-login">You have already account?<a href="signup.php">SignUp</a></span>
                </div>

                <!--Submit-->
                <div class="input-group submit">
                    <input name="login" type="submit" class="btn-submit" value="Log In" >
                    </input>
                </div>

                <?php
                    if(isset($txt_erro) && ($txt_erro != "")){
                        echo "<font color='red'>".$txt_erro. "</font>" ;
                    }
                ?>

                
            </form>
        </div>
    </div>
</body>
</html>