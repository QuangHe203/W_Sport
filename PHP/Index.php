<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SportManagement</title>
    <link rel="stylesheet" href="../CSS/Index.css">
</head>
<body>
    <?php
        require_once 'ConnectData.php';

        $stmt=$connect->prepare("SELECT * FROM organizations WHERE owner = ?");
        $stmt->bind_param("s", $user_id);
        $stmt->execute();
        $result=$stmt->get_result();
        $stmt->close();
    ?>
    <!--Navbar-->
    <div class="navbar">
        <div class="navbar-content">
            <div class="navbar-item">
                <div class="logo">
                    <a href="../PHP/Index.php" class="logo-title"> 
                        <h2 title="Sport Management">SportManagement</h2>
                    </a>
                </div>

                <div class="items">
                    <?php
                        if (isset($_SESSION["user_id"])) {
                            echo '<a href="../PHP/Profile.php">Profile</a>
                                <a href="../PHP/Logout.php">Logout</a>';
                        } else {
                            echo '<a href="../PHP/Login.php" class="sign_in">Log in</a>
                                <a href="../PHP/SignUp.php" class="sign_up">Sign up</a>';
                        }
                    ?>
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
                            <?php
                                if ($result->num_rows==0) {
                                    echo "<a href='../PHP/itemmenu.php' class='a-dashboad'>Go to Dashboad</a>";
                                } else {
                                    echo "<a href='../PHP/organization.php' class='a-dashboad'>Go to Dashboad</a>";
                                }
                            ?>
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