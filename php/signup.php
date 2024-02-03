<?php
    session_start();
    ob_start();
    include "./connectdb.php";
    if(isset($_POST['signup'])){
        // Lấy dữ liệu từ form
        $user = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $pass = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        // hash mat khau
        $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

        // sql
        $conn = connectdb();
        $stmt = $conn->prepare("INSERT INTO tbl_user (user, email, pass) VALUES (:username, :email, :pass)");
        $stmt->bindParam(':username', $user);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':pass', $hashed_password);
        // thuc thi sql
        try {
            $stmt->execute();

        // Hiển thị thông báo đăng ký thành công
            echo "<div class='success'>Đăng ký thành công!</div>";

        // Chuyển hướng sang trang đăng nhập sau 3 giây
            echo "<script>setTimeout(function(){window.location.href='login.php';}, 3000);</script>";
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link rel="stylesheet" href="../css/signup.css">

</head>
<body>
    
    <div class="container">
        <div class="container-content">
            <!--title-->
            <div class="title">
                <h1>SIGN UP</h1>
            </div>

            <!--Main content-->
            <form action="./signup.php" id="form-signup" method="post">
                <div class="input-group">
                    <label for="username">UserName</label>
                    <input class="form-input" type="text" id="username" required="required" placeholder="Enter your Username" name="username">
                </div>

                <div class="input-group">
                    <label for="name">Name</label>
                    <input class="form-input" type="text" id="name" required="required" placeholder="Enter your name" name="txtName">
                </div>

                <div class="input-group">
                    <label for="email">Email</label>
                    <input class="form-input" type="text" id="email" required="required" placeholder="Enter your email" name="email">
                </div>

                <div class="input-group">
                    <label for="password">Password</label>
                    <input class="form-input" type="password" id="password" required="required" placeholder="Enter your password" name="password">
                </div>

                <div class="text-account">
                    <span class="text-login">You have already account?<a href="login.php">Login</a></span>
                </div>

                <!--Submit-->
                <div class="input-group submit">
                    <input name="signup" type="submit" class="btn-submit" value="Sign Up">
                    </input>
                </div>

            </form>
        </div>
    </div>
     
</body>
</html>