<?php
    session_start();
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SportManagement</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <!--Navbar-->
    <div class="navbar">
        <div class="navbar-content">
            <div class="navbar-item">
                <div class="logo">
                    <a href="index.php" class="logo-title"> 
                        <h2 title="Sport Management">SportManagement</h2>
                    </a>
                </div>
                a
                <!-- <div class="items">
                    <a href="./php/login.php" class="sign_in">Log in</a>
                    <a href="./php/signup.php" class="sign_up">Sign up</a>
                </div> -->

                <div class="items">
                    Xin chào, <?php echo $username; ?>!
                    <a href="./php/logout.php">Log out</a>
                </div>
            </div>
        </div>
    </div>
    <!--main-->

    <div class="main_content">
        <div class="main-items">
            <main class="items-content">
                <div class="items-center">
                    <h1 class="">
                        <span class="block x1">Buid your organization and make sport program.</span>
                        <span class="block x1-text">Let's started!</span>
                    </h1>
                    <div class="node">
                        <div class="node-dashboad">
                            <a href="" class="a-dashboad">Go to Dashboad</a>
                        </div>
                        <div class="node-search">
                            <a href="" class="a-search">Search Program</a>
                        </div>
                    </div>
                    
                </div>
            </main>
            
        </div>
        
    </div>
    
</body>
</html>

<?php
} else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SportManagement</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="navbar">
        <div class="navbar-content">
            <div class="navbar-item">
                <div class="logo">
                    <a href="index.php" class="logo-title"> 
                        <h2 title="Sport Management">SportManagement</h2>
                    </a>
                </div>
                
                <div class="items">
                    <a href="./php/login.php" class="sign_in">Log in</a>
                    <a href="./php/signup.php" class="sign_up">Sign up</a>
                </div>
            </div>
        </div>
    </div>
    <div class="main_content">
        <div class="main-items">
            <main class="items-content">
                <div class="items-center">
                    <h1 class="">
                        <span class="block x1">Buid your organization and make sport program.</span>
                        <span class="block x1-text">Let's started!</span>
                    </h1>
                    <div class="node">
                        <div class="node-dashboad">
                            <a href="" class="a-dashboad">Go to Dashboad</a>
                        </div>
                        <div class="node-search">
                            <a href="" class="a-search">Search Program</a>
                        </div>
                    </div>
                    
                </div>
            </main>
            
        </div>
        
    </div>
</body>
</html>

<?php
}
?>