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

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add"])) {
        $type = $_POST["type"];
        $name = $_POST["name"];

        if ($type == "team_player") {
            $stmt = $connect->prepare("INSERT INTO teams_players (program_id, name) VALUES (?, ?)");
            $stmt->bind_param("ss", $_SESSION['program_id'], $name);
            if ($stmt->execute()) {
                $stmt->close();
            } else {
                echo "Error" . $stmt->error;
            }
        } else if ($type == "group") {
            $stmt = $connect->prepare("INSERT INTO groups (program_id, name) VALUES (?, ?)");
            $stmt->bind_param("ss", $_SESSION['program_id'], $name);
            if ($stmt->execute()) {
                $stmt->close();
            } else {
                echo "Error" . $stmt->error;
            }
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["del_group"])) {
        $id_group = $_POST["group_id"];

        $stmt = $connect->prepare("DELETE FROM groups WHERE _id=?");
        $stmt->bind_param("s", $id_group);
        if ($stmt->execute()) {
            $stmt->close();
        } else {
            echo "Error" . $stmt->error;
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["del_tpl"])) {
        $id_tpl = $_POST["id"];

        $stmt = $connect->prepare("DELETE FROM teams_players WHERE _id=?");
        $stmt->bind_param("s", $id_tpl);
        if ($stmt->execute()) {
            $stmt->close();
        } else {
            echo "Error" . $stmt->error;
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["save_group"])) {
        // Lấy giá trị ids và names từ form
        $ids = $_POST["ids"];
        $names = $_POST["name"];

        // Loop qua các phần tử trong mảng ids
        foreach ($ids as $key => $id) {
            // Lấy tên tương ứng từ mảng names
            $name = $names[$key];

            $stmt = $connect->prepare("UPDATE groups SET name=? WHERE _id=?");
            // Chỉnh sửa bind parameters để phù hợp với loại dữ liệu của trường _id
            $stmt->bind_param("si", $name, $id);

            if ($stmt->execute()) {
                echo "Name updated successfully for ID: " . $id . "<br>";
            } else {
                echo "Error updating name for ID: " . $id . "<br>";
            }
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
        <form action="" method="post">
            <div class="edit">
                <p class="header"><i class="fa fa-arrow-circle-up"></i>Edit Group</p>
                <p class="note">Nhấp vào tên Group để sửa đổi. Ấn <span><i class="fa fa-plus-circle"></i></span> để thêm tên nhóm.</p>
                <div class="name_group">

                    <?php
                    $query1 = "SELECT * FROM groups WHERE program_id = '" . $_SESSION['program_id'] . "'";
                    $total_row1 = mysqli_query($connect, $query1) or die('error');
                    if (mysqli_num_rows($total_row1) > 0) {
                        foreach ($total_row1 as $row1) {
                            $group_data[$row1['_id']] = $row1['_id'];
                    ?>
                            <div class="cre_gr">
                                <form action="" method="post">
                                    <input type="text" name="name_<?php echo $row1['_id']; ?>" value="<?php echo $row1['name'] ?>">
                                    <p class="closeicon">
                                        <button type="submit" name="del_group" class="fa fa-window-close"></button>
                                    </p>
                                    <input type="hidden" name="group_id" value="<?php echo $row1['_id']; ?>">
                                </form>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
                <!--Submit-->
                <div class="input_web submit">
                    <input type="submit" name="save_group" id="submit-btn" value="Save">
                </div>
            </div>
        </form>


        <form action="" method="post">
            <div class="edit">
                <p class="header"><i class="fa fa-arrow-circle-up"></i>Edit Teams/Players</p>
                <p class="note">Nhấp vào tên Team/Player để sửa đổi. Ấn <span><i class="fa fa-plus-circle"></i></span> để thêm tên nhóm.</p>
                <div class="name_group">
                    <?php
                    $query2 = "SELECT * FROM teams_players WHERE program_id = '" . $_SESSION['program_id'] . "'";
                    $total_row2 = mysqli_query($connect, $query2) or die('error');
                    if (mysqli_num_rows($total_row2) > 0) {
                        foreach ($total_row2 as $row2) {
                    ?>
                            <div class="cre_gr">
                                <form action="" method="post">
                                    <input type="text" value="<?php echo $row2['name']; ?>">
                                    <p class="closeicon">
                                        <button type="submit" name="del_tpl" class="fa fa-window-close"></button>
                                    </p>
                                    <input type="hidden" name="id" value="<?php echo $row2['_id']; ?>">
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
    </div>
    <div class="overlay" id="overlay"></div>
    <form class="add_member_popup" id="addMemberPopup" method="post">
        <span class="close_popup_button" id="closePopupBtn"><i class="fa fa-times"></i></span>
        <p class="popup_title">Add New Team/Player/Group Name</p>
        <label for="type">Type:</label>
        <select name="type" id="type">
            <option value="team_player">Team/Player</option>
            <option value="group">Group</option>
        </select>
        <label for="name">Name:</label>
        <input class="inputText" type="text" placeholder="" name="name">
        <div class="button_container">
            <button id="closePopup" class="closeP">Close</button>
            <button id="addMember" type="submit" class="addM" name="add">Add</button>
        </div>
    </form>

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