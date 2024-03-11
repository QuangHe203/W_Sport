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
    <div class="navbar">
        <div class="navbar-content">
            <div class="navbar-item">
                <div class="logo">
                    <a href="Index.php" class="logo-title">
                        <h2 title="Sport Management">SportManagement</h2>
                    </a>
                </div>

                <!--khi da dang nhap, hien thi profile-->
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

                        <p><strong>Sport: </strong> </p>
                        <p><strong>Duration: </strong> </p>
                        <p><strong>Type: </strong> </p>


                        <p><strong>StartDate: </strong> Thứ Sáu, 17 tháng 3 năm 2023</p>
                        <p><strong>DailyStart: </strong> </p>
                        <p><strong>DailyMatch: </strong> </p>



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