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

    $stmt = $connect->prepare("SELECT * FROM  website WHERE organization_id = ?");
    $stmt->bind_param("s", $organization_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $dataWebsite = $result->fetch_assoc(); //Data website
    $stmt->close();

    $stmt = $connect->prepare("SELECT * FROM  organizations WHERE _id = ?");
    $stmt->bind_param("s", $organization_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $dataOrganization = $result->fetch_assoc(); //Data organization
    $stmt->close();

    $stmt = $connect->prepare("SELECT * FROM  users WHERE _id = ?");
    $stmt->bind_param("s", $_SESSION["user_id"]);
    $stmt->execute();
    $result = $stmt->get_result();
    $dataOwner = $result->fetch_assoc(); //Data owner
    $stmt->close();

    /*$stmt = $connect->prepare("SELECT * FROM website CROSS JOIN programs");
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
    }*/
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

            <h2><?php echo $dataWebsite['web_name']; ?></h2>
            <p><?php echo $dataWebsite['tagline']; ?></p>

        </div>

        <div class="content">
            <div class="home">
                <div class="title">
                    <h4>Home</h4>
                </div>
                <?php
                $query = "SELECT * FROM programs WHERE organization_id = '" . $organization_id .  "'";
                $total_row = mysqli_query($connect, $query) or die('error');
                if (mysqli_num_rows($total_row) > 0) {
                    foreach ($total_row as $row) {
                ?>
                        <div class="info">
                            <div class="reg">
                                <div>
                                    <a href=""></a>
                                    <p> <?php echo $row['title']; ?> </p>
                                </div>
                                <div>
                                    <a href="../PHP/programDetail.php?programId=<?php echo urlencode($row['_id']); ?>" id="view_detail">View detail</a>
                                </div>
                            </div>
                            <div class="time_reg">

                                <p><strong>Sport: <?php echo $row['sport']; ?></strong> </p>
                                <p><strong>Type Game: <?php echo $row['type']; ?></strong> </p>

                                <p><strong>Start Date: <?php echo formatDate($row['startDate']); ?></strong> </p>

                                <p><strong>Daily Start: <?php echo formatTime($row['dailyStart']); ?></strong></p>
                                <p><strong>Duration: <?php echo $row['duration'] ?> Minute</strong> </p>
                            </div>

                            <div class="free">
                                <p></p>
                                <p>Free: 0 VND</p>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo "No programs available";
                }
                ?>

            </div>

            <div class="about">
                <div class="title">
                    <h4>About</h4>
                </div>
                <div class="item">

                    <p class="item_title"><?php echo $dataOrganization['name'] ?></p>
                    <p class="item_main"><?php echo $dataOrganization['description'] ?></p>

                </div>
                <div class="item">
                    <p class="item_title">Location</p>
                    <p class="item_main">Đang nghiên cứu</p>
                </div>
                <div class="item">
                    <p class="item_title">Contact</p>
                    <p class="item_main"><i class="fas fa-envelope"></i><?php echo $dataOwner['email'] ?></p>
                    <p class="item_main"><i class="fas fa-phone"></i><?php echo $dataOwner['phone'] ?></p>
                </div>

            </div>
        </div>

    </div>
    <script>
        var registerButtons = document.querySelectorAll(".btn-register");
        registerButtons.forEach(function(button) {
            button.addEventListener("click", function() {
                window.location.href = "../php/reg_show.php";
            });
        });
    </script>
</body>

</html>