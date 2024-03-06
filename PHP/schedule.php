<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/schedule.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php
        require_once 'ConnectData.php';

        if ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["addGame"])) {
            $team1=$_POST["nameTeam1"];
            $team2=$_POST["nameTeam2"];
            $startDate=$_POST["date"];
            $startTime=$_POST["startTime"];
            $endTime=$_POST["endTime"];
            $location=$_POST["location"];
            $typeGame=$_POST["gameType"];
            $gameNote=$_POST["gameNote"];

            $stmt=$connect->prepare("INSERT INTO games (program_id, team1, team2, startDate, startTime, endTime, location, typeGame, gameNote) value (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssssss", $_SESSION["program_id"], $team1, $team2, $startDate, $startTime, $endTime, $location, $typeGame, $gameNote);
            if ($stmt->execute()) {
                header("Location: schedule.PHP");
                exit();
            } else {
                echo "Error".$stmt->error;
            }
            $stmt->close();
            $connect->close();
        }

        $stmt=$connect->prepare("SELECT * FROM games WHERE program_id = ?");
        $stmt->bind_param("s", $_SESSION["program_id"]);
        $stmt->execute();
        $result=$stmt->get_result();
        $dataGame=$result->num_rows; //Data games
        $stmt->close();

    ?>
    <div class="main">
        <div class="header">
            <form action="" method="post">
                <input type="button" value="Add Game" id="addGame" class="addG">
                <input type="button" value="Add Event" id="addEvent" class="addE">

                    <!-- Bảng popup -->
                <form id="editGamesPopup" class="popup" method="post">
                    <div class="popup-content">
                        <span class="close">&times;</span>
                        <h2>Edit Games</h2>
                        <div class="inp_editGames">
                            <label for="">Home Team:</label>
                            <select name="nameTeam1" id="nameTeam1">
                                <option value="Đội A">Đội A</option>
                                <option value="Đội B">Đội B</option>
                                <option value="Đội C">Đội C</option>
                                <option value="Đội D">Đội D</option>
                            </select>
                        </div>

                        <div class="inp_editGames">
                            <label for="">Away Team:</label>
                            <select name="nameTeam2" id="nameTeam2">
                                <option value="Đội A">Đội A</option>
                                <option value="Đội B">Đội B</option>
                                <option value="Đội C">Đội C</option>
                                <option value="Đội D">Đội D</option>
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
                                <option value="a">A</option>
                                <option value="a">B</option>
                                <option value="a">C</option>
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
                                <option value="regular season">REGULAR SEASON</option>
                                <option value="a">a</option>
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

                <div id="editEventsPopup" class="popup">
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
                            <button id="add">Add</button>
                            <button id="close">Close</button>
                        </div>
                    </div>
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
                    if ($dataGame>0) {
                        while ($inforGame=$result->fetch_assoc()) {
                ?>
                    <div class="view_info">
                    <div class="time">
                        <p><?php echo $inforGame['startDate'];?></p>
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

                <div class="view_info">
                    <div class="time">
                        <p>Thứ Bảy, 18 tháng 3, 2023</p>
                    </div>

                    <div class="match_location showMatch">
                        <div class="info_match">
                            <div class="info_time">
                                <p>8:30</p>
                                <p>AM</p>
                            </div>
                            
                            <div class="info_nameclub">
                                <div class="nameClub">
                                    <p class="club1">ĐỘI A</p>
                                    <p class="vs">vs</p>
                                    <p class="club2">ĐỘI B</p>
                                </div>
                                <p class="nameplay">Team_Practice</p>
                            </div>
                        </div>
                        <div class="info_loca more">
                            <p class="stadium">Location: San Van Dong A</p>
                            <form action="" method="post">
                                <i class="fa fa-pencil-square-o"></i>
                                <i class="fas fa-trophy"></i>
                                <i class="fas fa-trash"></i>
                            </form>
                            
                        </div>
                    </div>

                    <div class="match_location showMatch">
                        <div class="info_match">
                            <div class="info_time">
                                <p>2:30</p>
                                <p>PM</p>
                            </div>
                            
                            <div class="info_nameclub">
                                <div class="nameClub">
                                    <p class="club1">ĐỘI C</p>
                                    <p class="vs">vs</p>
                                    <p class="club2">ĐỘI D</p>
                                </div>
                                <p class="nameplay">Regular_season</p>
                            </div>
                        </div>
                        <div class="info_loca more">
                            <p class="stadium">Location: San Van Dong A</p>
                            <form action="" method="post">
                                <i class="fa fa-pencil-square-o"></i>
                                <i class="fas fa-trophy"></i>
                                <i class="fas fa-trash"></i>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="view_info">
                    <div class="time">
                        <p>Chủ Nhật, 19 tháng 3, 2023</p>
                    </div>

                    <div class="match_location showMatch">
                        <div class="info_match">
                            <div class="info_time doubleTime">
                                <p>8:30</p>
                                <p>AM-</p>
                                <p>10:30</p>
                                <p>AM</p>
                            </div>
                            
                            <div class="info_nameclub doubleHour">
                                <div class="nameClub ">
                                    <p class="club1">ĐỘI E</p>
                                    <p class="vs">vs</p>
                                    <p class="club2">ĐỘI C</p>
                                </div>
                                <p class="nameplay">quarterfinals</p>
                            </div>
                        </div>
                        <div class="info_loca more">
                            <p class="stadium">Location: San Van Dong A</p>
                            <form action="" method="post">
                                <i class="fa fa-pencil-square-o"></i>
                                <i class="fas fa-trophy"></i>
                                <i class="fas fa-trash"></i>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="view_info">
                    <div class="time">
                        <p>Thứ Hai, 20 tháng 3, 2023</p>
                    </div>

                    <div class="match_location ">
                        <div class="info_match prac">
                            <div class="info_time doubleTime">
                                <p>8:30</p>
                                <p>AM-</p>
                                <p>10:30</p>
                                <p>AM</p>
                            </div>
                            <div class="info_status practice">
                                <p class="prac_title">Practice</p>
                            </div>
                            <div class="info_name nameprac">
                                <p class="status">Practice Regular</p>
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