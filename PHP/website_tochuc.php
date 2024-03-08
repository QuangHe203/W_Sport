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
    
        $sql = "SELECT * FROM website";  

        
        $result = $connect->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            $organization_name = $row['organization_name'];
            $tagline = $row['tagline'];
            $description = $row['description'];
            $address = $row['address'];
        } else {
            echo "No data found.";
        }

        $connect->close();

    ?>


    <div class="navbar">
        <div class="navbar-content">
            <div class="navbar-item">
                <div class="logo">
                    <a href="index.html" class="logo-title"> 
                        <h2 title="Sport Management">SportManagement</h2>
                    </a>
                </div>
    
                <div class="nav_profile">
                    <div class="dashboard">
                        <p class="goto"><a href="../html/itemmenu.html">Go to Dashboard</a></p>
                        <p><img src="../img/profile.jpg" alt=""></p>
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
                            <a href="">Summer Football 2024</a>
                            <p>+ San Van Dong A</p>
                        </div>
                        <input id="btn" type="button" value="Register">
                    </div>
                    <div class="time_reg">
                        <p><strong>Start: </strong> Thứ Sáu, 17 tháng 3 năm 2023</p>
                        <p><strong>Start Register: </strong>8:34 AM Thứ Năm, 6 tháng 4, 2023</p>
                        <p><strong>End Register: </strong> 1:15 PM Thứ Sáu, 28 tháng 4, 2023</p>
                    </div>

                    <div class="free">
                        <p>Individual Fee: 1110000 VND</p>
                        <p>Free: 0 VND</p>
                    </div>
                </div>
            </div>

            <div class="about">
                <div class="title">
                    <h4>About</h4>
                </div>
                <div class="item">
                    <p class="item_title"><?php echo $organization_name;?></p>
                    <p class="item_main"><?php echo $description; ?></p>
                </div>

                <div class="item">
                    <p class="item_title">Location</p>
                    <p class="item_main"><?php echo $address; ?></p>
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
            window.location.href = "../html/reg_show.html";
        });
    </script>
</body>
</html>