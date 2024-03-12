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

    $stmt = $connect->prepare("SELECT * FROM website CROSS JOIN programs");
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $organization_name = $row['organization_name'];
        $tagline = $row['tagline'];
        $description = $row['description'];
        $address = $row['address'];

        $title = $row['title'];
        $sport = $row['sport'];
        $typeGame = $row['type'];
        $startDate = $row['startDate'];
        $dailyStart = $row['dailyStart'];
        $duration = $row['duration'];
    }

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

            <h2><?php echo $organization_name ?></h2>
            <p><?php  echo $tagline?></p>

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
                            <p> <?php echo $title?> </p>
                        </div>
                        <input id="btn" type="button" value="Register">
                    </div>
                    <div class="time_reg">

                         <p><strong>Sport: <?php echo $sport ?></strong> </p>
                         <p><strong>Type Game: <?php echo $typeGame ?></strong> </p>

                            <p><strong>Start Date: <?php echo $startDate ?></strong> </p>

                            <p><strong>Daily Start: <?php echo $dailyStart?></strong></p>
                            <p><strong>Duration: <?php  echo $duration ?> </strong> </p>
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

                    <p class="item_title"><?php echo $organization_name ?></p>
                    <p class="item_main"><?php echo $tagline ?></p>

                </div>
                <div class="item">
                    <p class="item_title">Location</p>
                    <p class="item_main"><?php echo $address ?></p>
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