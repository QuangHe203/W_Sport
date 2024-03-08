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
            header("Location: programs.php");
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
            $del_id = $_POST["del_id"];
        
            if ($connect->connect_error) {
                die('Cannot connect to database' . $connect_error);
            } else {
                $stmt_programs = $connect->prepare("DELETE FROM programs WHERE _id=?");
                $stmt_programs->bind_param("s", $del_id);
        
                $stmt_games = $connect->prepare("DELETE FROM games WHERE program_id=?");
                $stmt_games->bind_param("s", $del_id);
        
                $stmt_events = $connect->prepare("DELETE FROM events WHERE program_id=?");
                $stmt_events->bind_param("s", $del_id);
        
                $stmt_registration = $connect->prepare("DELETE FROM registrationRequires WHERE program_id=?");
                $stmt_registration->bind_param("s", $del_id);
            }
        
            if ($stmt_programs->execute() && $stmt_games->execute() && $stmt_events->execute() && $stmt_registration->execute()) {
                header("Location: programs.php");
                $stmt_programs->close();
                $stmt_games->close();
                $stmt_events->close();
                $stmt_registration->close();
                exit;
            } else {
                echo "Error" . $stmt_programs->error;
            }
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


                <input id="btn" type="button" value="Create Program">
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
                    <input type="submit" class="del_program" value="Delete" name="delete">
                </form>
                <form action="settings.php" method="post">   
                    <input type="hidden" id="program_id" name="program_id" value="<?php echo $infor['_id'];?>">
                    <input type="submit" id="bt_edit" class="more-link" value="Edit" name="edit">

                </form>
            </div>
        </div>        
    <?php
                    
        }
    }
    ?>
    <script>
        document.getElementById("btn").addEventListener("click", function() {
            window.location.href = "../PHP/newprogram.php";
        });

        // Sự kiện khi nhấp vào nút "Edit"
        var editButtons = document.querySelectorAll('.more-link');
        editButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var programId = this.parentNode.querySelector('[name="program_id"]').value;
                var iframe = document.getElementById('content');
                // Thay đổi src của iframe sang trang settings.php và truyền program_id qua phương thức POST
                iframe.src = 'settings.php?program_id=' + programId;
            });
        });


    </script>

</body>
</html>