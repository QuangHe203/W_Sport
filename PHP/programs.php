<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programs</title>
    <link rel="stylesheet" href="../css/programs.css">
</head>
<body>
    <?php
        require_once 'ConnectData.php';

        if ($connect->connect_error) {
            die('Cannot connect to database'.$connect->connect_error);
        } else {
            $stmt = $connect->prepare("SELECT * FROM programs WHERE organization_id = ?");
            $stmt->bind_param("s", $organization_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $rowCount = $result->num_rows;
            $stmt->close();
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit"])) {
            $_SESSION["program_id"]=$_POST["program_id"];
            header("Location: settings.php");
            exit();
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
            $del_id = $_POST["del_id"];

            if ($connect->connect_error) {
                die('Cannot connect to database'.$connect->connect_error); 
            } else {
                $stmt=$connect->prepare("SELECT _id FROM registrationRequires WHERE program_id=?");
                $stmt->bind_param("s", $del_id);
                $stmt->execute();
                $stmt->bind_result($registrationRequires_id);
                $stmt->fetch();
                $stmt->close();
            }
        
            if ($connect->connect_error) {
                die('Cannot connect to database' . $connect_error);
            } else {
                $stmt_priceOption = $connect->prepare("DELETE FROM priceOptions WHERE regisRequire_id=?");
                $stmt_priceOption->bind_param("s", $registrationRequires_id);

                $stmt_registration = $connect->prepare("DELETE FROM registrationRequires WHERE program_id=?");
                $stmt_registration->bind_param("s", $del_id);

                $stmt_games = $connect->prepare("DELETE FROM games WHERE program_id=?");
                $stmt_games->bind_param("s", $del_id);
        
                $stmt_events = $connect->prepare("DELETE FROM events WHERE program_id=?");
                $stmt_events->bind_param("s", $del_id);

                $stmt_programs = $connect->prepare("DELETE FROM programs WHERE _id=?");
                $stmt_programs->bind_param("s", $del_id);
            }
        
            if ($stmt_priceOption->execute() && $stmt_registration->execute() && $stmt_games->execute() && $stmt_events->execute()  && $stmt_programs->execute()) {
                $stmt_priceOption->close();
                $stmt_registration->close();
                $stmt_games->close();
                $stmt_events->close();
                $stmt_programs->close();
                header('Location: programs.php');
                exit();
            } else {
                echo "Error" . $stmt_programs->error;
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["createProgram"])) {
            $title = $_POST["title"];
            $sport = $_POST["sport"];
            $program = $_POST["program"];
    
            if ($connect->connect_error) {
                die('Cannot connect to database' . $connect_error);
            }
    
            $stmt = $connect->prepare("INSERT INTO programs (title, sport, type, organization_id) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $title, $sport, $program, $organization_id);
    
            if ($stmt->execute()) {
                $_SESSION["program_id"] = $stmt->insert_id;
    
                $stmt->close();
    
                $stmt = $connect->prepare("INSERT INTO registrationRequires (program_id, name_email, phone, birthday, gender, individualPlayer, teamPlayer, coach, staff, individual) VALUES (?, 0, 0, 0, 0, 0, 0, 0, 0, 0)");
                $stmt->bind_param("s", $_SESSION["program_id"]);
    
                if ($stmt->execute()) {
                    header("Location: itemmenu.php");
                    header("Location: programs.php");
                    exit();
                } else {
                echo "Error" . $stmt->error;
                }
    
                $stmt->close();
            } else {
                echo "Error" . $stmt->error;
            }
    
            $stmt->close();
        }
    ?>
    <div class="main">
        <div class="header">Programs</div>
        <div class="items">
            <form action="" method="post" class="form-item">
                <input class="search" type="text" placeholder="Search">
                <select id="sport" name="sportlist" form="sportform">
                    <option value="Sport">Sport</option>
                    <option value="League">League</option>
                    <option value="b">B</option>
                    <option value="c">C</option>
                </select>

                <select id="all" name="all" form="all">
                    <option value="all">All</option>
                    <option value="a">A</option>
                    <option value="b">B</option>
                    <option value="c">C</option>
                </select>

                <input class="add_member_button" id="btn" type="button" value="Create Program" name="createProgram">
            </form>
        </div>
    </div>
    <?php
        if ($rowCount > 0) {
            while ($infor = $result->fetch_assoc()) {
    ?>
        <div class="container">
            <div class="profile">
                <img src="../image/cau-long-vu.jpg" alt="Profile Picture">
            </div>
            <div class="info">
                <p class="program_name"><?php echo $infor['title'];?></p>
                <p class="program_title"><?php echo $infor['subTitle'];?></p>
                <form action="" method="post" class="actionForm">
                    <p class="program_time"><?php echo $infor['startDate'];?></p>
                    <?php 
                    if ($infor['openRegister']==1) {
                        echo '<p class="program_sta">Published</p>';
                    } else {
                        echo '<p class="program_sta" style="color: red;">Unpublished</p>';
                    };
                    ?>
                    <input type="hidden" name="del_id" value="<?php echo $infor['_id'];?>">
                    <input type="submit" class="del_program" value="delete" name="delete">
                </form>
                <form action="" method="post">   
                    <input type="hidden" id="program_id" name="program_id" value="<?php echo $infor['_id'];?>">
                    <input type="submit" id="bt_edit" class="more-link" value="edit" name="edit">
                </form>
            </div>
        </div>        
    <?php
                    
        }
    }
    ?>
    <div class="overlay" id="overlay"></div>
    <form action="" method="post" class="add_member_popup" id="addMemberPopup">
        <span class="close_popup_button" id="closePopupBtn"><i class="fa fa-times"></i></span>
        <p class="popup_title">New program</p>
            <div class="input_program">
                <label for="live_search_title">Title</label>
                <input class="inp_program" type="text" id="live_search_title" required="required" placeholder="Enter your Title" name="live_search_title">
            </div>
    
            <div class="input_program">
                <label for="sport">Sport</label>
                <select id="sport" name="sport">
                    <option value="VolleyBall">VolleyBall</option>
                    <option value="Football">Football</option>
                    <option value="Badminton">Badminton</option>
                    <option value="Tenis">Tenis</option>
                </select>
            </div>
    
            <div class="input_program">
                <label for="program">Type of Program</label>
                <select id="program" name="program">
                    <option value="Tounament">Tounament</option>
                    <option value="League">League</option>
                    <option value="Camp">Camp</option>
                    <option value="Class">Class</option>
                    <option value="Training">Training</option>
                    <option value="Event">Event</option>
                    <option value="Club">Club</option>
                </select>
                </div>
        <div class="button_container">
            <button id="closePopup" class="closeP">Close</button>
            <input type="submit" name="createProgram" id="addMember" class="addM" value="Create">
        </div>
    </form>
    <script>
        // JavaScript mới
        var overlay = document.getElementById('overlay');
        var popup = document.getElementById('addMemberPopup');
        var iframeOverlay = document.getElementById('iframeOverlay');

        document.getElementById('btn').addEventListener('click', function() {
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
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            jQuery("#live_search_title").keyup(function(){
                var input_title = jQuery(this).val();
                console.log(input_title);
            });
        });
    </script>
</body>
</html>