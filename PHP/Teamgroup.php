<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/teamgroup.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/settings.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

<?php
    require_once 'ConnectData.php';

     $stmt = $connect->prepare("SELECT * FROM programs WHERE _id = ?");
     $stmt->bind_param("s", $_SESSION["program_id"]);
     $stmt->execute();
     $result = $stmt->get_result();
     $dataProgram = $result->fetch_assoc(); //Data program
     $stmt->close();

    $stmt = $connect->prepare("SELECT * FROM groups WHERE program_id = ?");
    $stmt->bind_param("s", $_SESSION["program_id"]);
    $stmt->execute();
    $result1 = $stmt->get_result();
    $dataGroup = $result1->fetch_assoc(); //Data group
    $stmt->close();

    $stmt = $connect->prepare("SELECT * FROM teams_players WHERE program_id = ?");
    $stmt->bind_param("s", $_SESSION["program_id"]);
    $stmt->execute();
    $result2 = $stmt->get_result();
    $dataTeams_Players = $result2->fetch_assoc(); //Data program
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
    
                <!--khi da dang nhap, hien thi profile-->
                <div class="nav_profile">
                    <div class="dashboard">
                        <p class="goto"><a href="../php/Dashboard.php">Go to Dashboard</a></p>
                        <a href="../PHP/itemmenu.php"><img src="../Image/profile.jpg" alt="User Avatar" class="user-avatar"> </a>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="name_programs">
        <h3><?php echo $dataProgram['title']?></h3>
    </div>

    <div class="menu_setting">
        <ul>
            <li><a href="../PHP/BasicInfo.php" target="content">Basic Info</a></li>
            <li><a href="../PHP/SetUpTime.php" target="content">Setup Time</a></li>
            <li><a href="../PHP/registration_setting.php" target="content">Registration</a></li>
            <li><a href="../PHP/teamgroup.php" target="content">Team & Group</a></li>
            <li><a href="../PHP/schedule.php" target="content">Schedule</a></li>
        </ul>
    </div>
    <div class="main">
        <form action="" method="post">
            <div class="edit">
                <p class="header"><i class="fa fa-arrow-circle-up"></i>Edit Group</p>
                <p class="note">Nhấp vào tên Group để sửa đổi. Ấn <span><i class="fa fa-plus-circle"></i></span> để thêm tên nhóm.</p>
                <div class="name_group">
                    <?php
                        $query1 = "SELECT * FROM groups WHERE program_id = '" . $_SESSION['program_id'] . "'";
                        $total_row1=mysqli_query($connect,$query1) or die('error');
                        if (mysqli_num_rows($total_row1) > 0) {
                            foreach ($total_row1 as $row1) {
                    ?>
                    <div class="cre_gr">
                        <form action="" method="post">
                            <input type="text" value="<?php echo $row1['name']?>">
                            <p class="closeicon">
                                <i class="fa fa-window-close"></i>
                            </p>
                        </form>
                    </div>
                    <?php
                            } 
                        }
                    ?>
                </div>

                <!--Submit-->
                <div class="input_web submit">
                    <input type="submit" name="" id="submit-btn" value="Save">
                </div>
            </div>
        </form>

        <form action="" method="post">
            <div class="edit">
                <p class="header"><i class="fa fa-arrow-circle-up"></i>Edit Teams/Players</p>
                <p class="note">Nhấp vào tên Team/Player để sửa đổi. Ấn <span><i class="fa fa-plus-circle"></i></span> để thêm tên nhóm.</p>
                <div class="name_group">
                <?php 
                        if ($dataTeams_Players>0) {
                            while ($inforTeams_Players=$result2->fetch_assoc()) {

                    ?>
                    <div class="cre_gr">
                        <form action="" method="post">
                            <input type="text" value="<?php echo $inforTeams_Players['name']?>">
                            <p class="closeicon">
                                <i class="fa fa-window-close"></i>
                            </p>
                        </form>
                    </div>
                    <?php
                            } 
                        }
                    ?>
                    <div class="cre_gr">
                        <form action="" method="post">
                            <input type="text">
                            <p class="closeicon">
                                <i class="fa fa-window-close"></i>
                            </p>
                        </form>
                    </div>

                    <div class="cre_gr">
                        <form action="" method="post">
                            <input type="text">
                            <p class="closeicon">
                                <i class="fa fa-window-close"></i>
                            </p>
                        </form>
                    </div>

                    <div class="cre_gr">
                        <form action="" method="post">
                            <input type="text">
                            <p class="closeicon">
                                <i class="fa fa-window-close"></i>
                            </p>
                        </form>
                    </div>
                </div>

                <!--Submit-->
                <div class="input_web submit">
                    <input type="submit" name="" id="submit-btn" value="Save">
                </div>
            </div>
        </form>
    </div>
    <div class="overlay" id="overlay"></div>
    <div class="add_member_popup" id="addMemberPopup">
        <span class="close_popup_button" id="closePopupBtn"><i class="fa fa-times"></i></span>
        <p class="popup_title">Add New Team/Player/Group Name</p>
        <label for="type">Type:</label>
        <select name="type" id="type">
            <option value="team_player">Team/Player</option>
            <option value="group">Group</option>
        </select>
        <label for="name">Name:</label>
        <input class="inputText" type="text" placeholder="">
        <div class="button_container">
            <button id="closePopup" class="closeP">Close</button>
            <button id="addMember" class="addM">Add</button>
        </div>
    </div>

    <div class="add_member_button" id="openPopupBtn"><i class="fa fa-plus"></i></div>
    <script>
        // JavaScript mới
        var overlay = document.getElementById('overlay');
        var popup = document.getElementById('addMemberPopup');
        var iframeOverlay = document.getElementById('iframeOverlay');

        document.getElementById('openPopupBtn').addEventListener('click', function() {
            overlay.classList.add('show');
            popup.classList.add('show');
            iframeOverlay.classList.add('show'); // Hiển thị overlay cho iframe
        });

        document.getElementById('closePopupBtn').addEventListener('click', function() {
            overlay.classList.remove('show');
            popup.classList.remove('show');
            iframeOverlay.classList.remove('show'); // Ẩn overlay cho iframe
        });

        document.getElementById('closePopup').addEventListener('click', function() {
            overlay.classList.remove('show');
            popup.classList.remove('show');
            iframeOverlay.classList.remove('show'); // Ẩn overlay cho iframe
        });
    </script>
</body>

</html>