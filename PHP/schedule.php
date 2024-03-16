<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/schedule.css">
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

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addGame"])) {
        $team1 = $_POST["nameTeam1"];
        $team2 = $_POST["nameTeam2"];
        $startDate = $_POST["date"];
        $startTime = $_POST["startTime"];
        $endTime = $_POST["endTime"];
        $location = $_POST["location"];
        $typeGame = $_POST["gameType"];
        $gameNote = $_POST["gameNote"];

        $stmt = $connect->prepare("INSERT INTO games (program_id, team1, team2, startDate, startTime, endTime, location, typeGame, gameNote) value (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssss", $_SESSION["program_id"], $team1, $team2, $startDate, $startTime, $endTime, $location, $typeGame, $gameNote);
        if ($stmt->execute()) {
            header("Location: schedule.PHP");
            exit();
        } else {
            echo "Error" . $stmt->error;
        }
    }

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
        <h3><?php echo $dataProgram['title'] ?></h3>
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
        <div class="header">
            <form action="" method="post">
                <input type="button" value="Add Game" id="addGame" class="addG">
                <input type="button" value="Add Event" id="addEvent" class="addE">

                <!-- Bảng popup -->
                <div id="editGamesPopup" class="popup" method="post">
                    <form action="" method="post">
                        <div class="popup-content">
                            <span class="close">&times;</span>
                            <h2>Edit Games</h2>
                            <div class="inp_editGames">
                                <label for="">Home Team:</label>
                                <select name="nameTeam1" id="nameTeam1">
                                    <?php
                                    $query = "SELECT * from teams_players";
                                    $total_row = mysqli_query($connect, $query) or die('error');
                                    if (mysqli_num_rows($total_row) > 0) {
                                        foreach ($total_row as $row) {
                                    ?>
                                            <option value="<?php echo $row['_id']; ?>">
                                                <?php echo $row['name'] ?>
                                            </option>
                                    <?php
                                        }
                                    } else {
                                        echo 'No Data Found!';
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="inp_editGames">
                                <label for="">Away Team:</label>
                                <select name="nameTeam2" id="nameTeam2">
                                    <?php
                                    $query = "SELECT * from teams_players";
                                    $total_row = mysqli_query($connect, $query) or die('error');
                                    if (mysqli_num_rows($total_row) > 0) {
                                        foreach ($total_row as $row) {
                                    ?>
                                            <option value="<?php echo $row['_id']; ?>">
                                                <?php echo $row['name'] ?>
                                            </option>
                                    <?php
                                        }
                                    } else {
                                        echo 'No Data Found!';
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="inp_editGames">
                                <label for="">Date:</label>
                                <input type="date" id="date" name="date">
                            </div>

                            <div class="inp_editGames">
                                <label for="">Group</label>
                                <select name="team" id="group" name="group">
                                    <option value="none">None</option>
                                    <?php
                                    $query = "SELECT * from groups";
                                    $total_row = mysqli_query($connect, $query) or die('error');
                                    if (mysqli_num_rows($total_row) > 0) {
                                        foreach ($total_row as $row) {
                                    ?>
                                            <option value=<?php echo $row['name']; ?>>
                                                <?php echo $row['name'] ?>
                                            </option>
                                    <?php
                                        }
                                    } else {
                                        echo 'No Data Found!';
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="inp_editGames">
                                <label for="">Start Time</label>
                                <input type="time" placeholder="" class="startTime" id="startTime" name="startTime">
                            </div>

                            <div class="inp_editGames">
                                <label for="">End Time</label>
                                <input type="time" placeholder="" id="endTime" name="endTime">
                            </div>
                            <div class="inp_editGames">
                                <label for="">Location</label>
                                <input type="text" placeholder="" id="location" name="location">
                            </div>
                            <div class="inp_editGames">
                                <label for="">Game Type</label>
                                <select name="gameType" id="gameType">
                                    <option value="Group stage">Group stage</option>
                                    <option value="Quarter-finals">Quarter-finals</option>
                                    <option value="Semi-finals">Semi-finals</option>
                                    <option value="Finals">Finals</option>
                                </select>
                            </div>
                            <div class="inp_editGames">
                                <label for="">Game Note</label>
                                <textarea name="gameNote" id="gameNote" cols="30" rows="2"></textarea>
                            </div>


                            <div class="button_container">
                                <button id="add" type="submit" name="addGame">Add</button>
                                <button id="close">Close</button>
                            </div>
                        </div>
                    </form>

                </div>


                <div id="editEventsPopup" class="popup" method="post">
                    <form action="" method="post">
                        <div class="popup-content">
                            <span class="closeE">&times;</span>
                            <h2>Edit Events</h2>
                            <div class="inp_editGames">
                                <label for="">Home Team:</label>
                                <select name="team" id="nameTeam">
                                    <option value="Đội A">Đội A</option>
                                    <option value="Đội B">Đội B</option>
                                    <option value="Đội C">Đội C</option>
                                    <option value="Đội D">Đội D</option>
                                </select>
                            </div>

                            <div class="inp_editGames">
                                <label for="">Away Team:</label>
                                <select name="team" id="nameTeam">
                                    <option value="Đội A">Đội A</option>
                                    <option value="Đội B">Đội B</option>
                                    <option value="Đội C">Đội C</option>
                                    <option value="Đội D">Đội D</option>
                                </select>
                            </div>

                            <div class="inp_editGames">
                                <label for="">Date:</label>
                                <input type="date" id="date">
                            </div>

                            <div class="inp_editGames">
                                <label for="">Group</label>
                                <select name="team" id="group">
                                    <option value="none">None</option>
                                    <option value="a">a</option>
                                </select>
                            </div>

                            <div class="inp_editGames">
                                <label for="">Start Time</label>
                                <input type="time" placeholder="" class="startTime">
                            </div>

                            <div class="inp_editGames">
                                <label for="">End Time</label>
                                <input type="time" placeholder="" id="endTime">
                            </div>
                            <div class="inp_editGames">
                                <label for="">Location</label>
                                <input type="text" placeholder="" id="location">
                            </div>
                            <div class="inp_editGames">
                                <label for="">Game Type</label>
                                <select name="team" id="gameType">
                                    <option value="none">REGULAR SEASON</option>
                                    <option value="a">a</option>
                                </select>
                            </div>
                            <div class="inp_editGames">
                                <label for="">Game Note</label>
                                <textarea name="" id="gameNote" cols="30" rows="2"></textarea>
                            </div>


                            <div class="button_container">
                                <button id="close">Close</button>
                                <button id="save">Save</button>
                            </div>
                        </div>
                    </form>
                </div>

            </form>
            <form action="">
                <div class="item_switch">
                    <label class="switch">
                        <input type="checkbox" name="" id="">
                        <span class="slider round"></span>
                    </label>
                    <p class="unpub">Unpublish game</p>
                </div>

                <div class="item_switch">
                    <label class="switch">
                        <input type="checkbox" name="" id="">
                        <span class="slider round"></span>
                    </label>
                    <p class="unpub">Unpublish event</p>
                </div>
            </form>
        </div>
        <div class="create_web">
            <!--Schedule-->
            <div id="scheduleContent" class="content">
                <?php
                function getName($team_id)
                {
                    $connect = new mysqli("localhost", "root", "", "web_sport");
                    if ($connect->connect_error) {
                        echo "Connection error : " . $connect->connect_error;
                    }

                    $stmt = $connect->prepare("SELECT name FROM teams_players WHERE _id = ?");
                    $stmt->bind_param("s", $team_id);
                    $stmt->execute();
                    $stmt->bind_result($team_name);
                    $stmt->fetch();
                    $stmt->close();

                    return $team_name;
                }

                $query_game = "SELECT * FROM games WHERE program_id= '" . $_SESSION['program_id'] . "'";
                $total_row = mysqli_query($connect, $query_game) or die('error');
                $prev_start_date = null;
                if (mysqli_num_rows($total_row) > 0) {
                    foreach ($total_row as $row) {
                ?>
                        <div class="view_info">
                            <?php
                            if ($row['startDate'] != $prev_start_date) {
                                echo '
                <div class="time">
                    <p>' . formatDate($row['startDate']) . '</p>
                </div>
                ';
                            }
                            $prev_start_date = $row['startDate'];
                            ?>

                            <div class="match_location showMatch">
                                <div class="info_match">
                                    <div class="info_time">
                                        <p><?php echo formatTime($row['startTime']); ?></p>
                                    </div>

                                    <div class="info_nameclub">
                                        <div class="nameClub">
                                            <p class="club1"><?php echo getName($row['team1']); ?></p>
                                            <p class="vs">vs</p>
                                            <p class="club2"><?php echo getName($row['team2']); ?></p>
                                        </div>
                                        <p class="nameplay"><?php echo $row['typeGame']; ?></p>
                                    </div>
                                </div>
                                <div class="info_loca more">
                                    <p class="stadium">Location: <?php echo $row['location']; ?></p>
                                    <form action="" method="post">
                                        <i class="fa fa-pencil-square-o"></i>
                                        <i class="fas fa-trophy"></i>
                                        <i class="fas fa-trash"></i>
                                    </form>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>

                <div class="view_info">
                    <div class="time">
                        <p>Thứ Sáu, 17 tháng 3, 2023</p>
                    </div>

                    <div class="match_location">
                        <div class="info_match">
                            <div class="info_time">
                                <p>8:35</p>
                                <p>AM</p>
                            </div>
                            <div class="info_status">
                                <p>Training</p>
                            </div>
                            <div class="info_name">
                                <p class="status">Training Regular</p>
                                <p class="nameplay">Team/Player: Đội A</p>
                            </div>
                        </div>

                        <div class="info_loca">
                            <p class="stadium">Sân bóng B</p>
                            <form action="" method="post">
                                <i class="fa fa-pencil-square-o"></i>
                                <i class="fas fa-trash"></i>
                            </form>

                        </div>
                    </div>
                </div>
        </div>
    </div>
    <script>
        document.getElementById('addGame').addEventListener('click', function() {
            document.getElementById('editGamesPopup').style.display = 'block';
        });
        document.getElementById('close').addEventListener('click', function() {
            document.getElementById('editGamesPopup').style.display = 'none';
        });
        document.querySelector('.close').addEventListener('click', function() {
            document.getElementById('editGamesPopup').style.display = 'none';
        });
        document.querySelector('.closeE').addEventListener('click', function() {
            document.getElementById('editEventsPopup').style.display = 'none';
        });
        document.getElementById('addEvent').addEventListener('click', function() {
            document.getElementById('editEventsPopup').style.display = 'block';
        });
        document.getElementById('closeE').addEventListener('click', function() {
            document.getElementById('editEventsPopup').style.display = 'none';
        });
    </script>
</body>

</html>