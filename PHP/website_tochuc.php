<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/web_tochuc.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<body>
<?php
        require_once 'ConnectData.php';
            $stmt = $connect->prepare("SELECT website.*, * programs FROM programs INNER JOIN website ON programs.organization_id = website.organization_id WHERE programs.program_id = ?");
            $stmt->bind_param("s", $_SESSION['program_id']);
            $stmt->execute();
            $result = $stmt->get_result();
            $data = $result->fetch_assoc();
            $stmt->close();
    ?>


    <div class="navbar">
        <div class="navbar-content">
            <div class="navbar-item">
                <div class="logo">
                    <a href="index.php" class="logo-title"> 
                        <h2 title="Sport Management">SportManagement</h2>
                    </a>
                </div>
    
                <div class="nav_profile">
                    <div class="dashboard">
                        <p class="goto"><a href="../php/itemmenu.php">Go to Dashboard</a></p>
                        <p><img src="../image/profile.jpg" alt=""></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main">
        <div class="header">
            <h2><?php echo $organization_name; ?></h2>
            <p><?php echo $tagline;?></p>
        </div>

        <div class="content">
            <div class="home">
                <div class="title">
                    <h4>Home</h4>
                </div>
                <div class="info">
                    <div class="reg">
                        <div>
                            <a href=""></a>
                            <p>+ </p>
                        </div>
                        <input id="btn" type="button" value="Register">
                    </div>
                    <div class="time_reg">
                        <p><strong>Start: <?php echo $data['startDate'];?></strong> </p>
                        <p><strong>Start Register: </strong></p>
                        <p><strong>End Register: </strong> </p>
                    </div>

                    <div class="free">
                        <p></p>
                        <p>Free: 0 VND</p>
                    </div>
                </div>
            </div>

            <div class="about">
                <div class="title">
                    <h4>About</h4>
                </div>
                <div class="item">
                    <p class="item_title"><?php echo $data['organization_name'];?></p>
                    <p class="item_main"><?php echo $data['description']; ?></p>
                </div>

                <div class="item">
                    <p class="item_title">Location</p>
                    <p class="item_main"><?php echo $data['address']; ?></p>
                </div>

                <div class="item">
                    <p class="item_title">Contact</p>
                    <p class="item_main"><i class="fas fa-envelope"></i>abc@gmail.com</p>
                    <p class="item_main"><i class="fas fa-phone"></i>0355879632</p>
                </div>
                
            </div>
        </div>

    </div>
    <script>
        document.getElementById("btn").addEventListener("click", function() {
            window.location.href = "../php/reg_show.php";
        });
    </script>
</body>
</html>