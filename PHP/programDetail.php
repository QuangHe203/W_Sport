<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/programDetail.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<body>

<?php
require_once 'ConnectData.php';


$programId = $_SESSION['program_id'];

$stmt = $connect->prepare("SELECT * FROM programs WHERE _id = ?");
$stmt->bind_param("s", $programId);
$stmt->execute();
$result = $stmt->get_result();

//  tra xem có dữ liệu hay không
if ($result->num_rows > 0) 
    $row = $result->fetch_assoc();
    $stmt->close();
?>

    <div class="navbar">
        <div class="navbar-content">
            <div class="navbar-item">
                <div class="logo">
                    <a href="Index.php" class="logo-title"> 
                        <h2 title="Sport Management">SportManagement</h2>
                    </a>
                </div>
    
                 <div class="nav_profile">
                    <div class="dashboard">
                        <p class="goto"><a href="../PHP/itemmenu.php">Go to Dashboard</a></p>
                        <p><img src="../img/profile.jpg" alt=""></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main">
        
        <div class="content">
            <div class="home">
                <div class="info">
                    <div class="reg">
                        <div>
                            
                            <p></p>
                            <p>+ San Van Dong A</p>
                        </div>
                        <input id="btn" type="button" value="Register">
                    </div>
                    <div class="time_reg">


                        <p><strong>Title: </strong><?php echo $row['title']; ?></p>
                        <p><strong>Sport: </strong><?php echo $row['sport']; ?> </p>
                        <p><strong>Duration: </strong> <?php echo $row['duration']; ?></p>
                        <p><strong>Type: </strong> <?php echo $row['type']; ?></p>


                        <p><strong>StartDate: </strong> <?php echo $row['startDate']; ?></p>
                        <p><strong>DailyStart: </strong> <?php echo $row['dailyStart']; ?></p>
                        <p><strong>DailyMatch: </strong> <?php echo $row['dailyMatch']; ?></p>



                    </div>

                    <div class="free">
                        <p>Individual Fee: </p>
                        <p>Free: </p>
                    </div>
                </div>
            </div>

            <div class="about">
                <div class="title">
                    <h4>About</h4>
                </div>
                <div class="item">
                    <p class="item_title">King Ash</p>
                    <p class="item_main">Hi! Welcome to our website!</p>
                </div>

                <div class="item">
                    <p class="item_title">Location</p>
                    <p class="item_main">Ha Noi, Viet Nam</p>
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
            window.location.href = "../PHP/reg_show.php";
        });
    </script>
</body>
</html>
