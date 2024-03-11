<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../css/reg_show.css">
</head>

<body>

    <?php
    require_once 'ConnectData.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $gender = $_POST['gender'];
        $role = $_POST['role'];
        $teamName = $_POST['teamName'];
        $price = $_POST['price'];
        $note = $_POST['note'];

        session_start();
        $programId = $_SESSION['program_id'];

        $stmt = $connect->prepare("INSERT INTO registrations (program_id, name, email, phone, gender, role, team_name, price_option, note) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("issssss", $programId,  $phone, $gender, $role, $teamName, $price, $note);

        if ($stmt->execute()) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $connect->close();
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
                        <p class="goto"><a href="../PHP/itemmenu.php">Go to Dashboard</a></p>
                        <p><img src="../img/profile.jpg" alt=""></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main">
        <div class="header">Register</div>
        <p class="header_title">Summer Fooball 2024</p>
        <div class="create_web">
            <form action="" id="new_web" method="post">
                <div class="info">
                    <p class="info_title">Your info</p>
                    <p class="info_name"></p>
                </div>
                <div class="input_web">
                    <p class="name">Name</p>
                    <input class="inp_program" type="text" id="name" required="required" placeholder="Enter your Name" name="name">
                </div>
                <div class="input_web">
                    <p class="name">Email</p>
                    <input class="inp_program" type="text" id="email" required="required" placeholder="Enter your email" name="email">
                </div>
                <div class="input_web">
                    <label for="phone">Phone:</label>
                    <input class="inp_program" type="text" id="phone" required="required" placeholder="Enter your Phone" name="phone">
                </div>

                <div class="input_web">
                    <label for="gender">Gender: </label>
                    <input class="inp_program" type="text" id="gender" required="required" placeholder="Enter your Gender" name="gender">
                </div>

                <div class="input_web">
                    <label for="role">Role:</label>
                    <input class="inp_program" type="text" id="role" required="required" placeholder="Enter your Role" name="role">
                </div>

                <div class="input_web">
                    <label for="teamName">Team Name:</label>
                    <input class="inp_program" type="text" id="teamName" required="required" placeholder="Enter your Team Name" name="teamName">
                    <p class="none">*Enter team name if you join as coach, team player, staff, else you can type 'None'</p>
                </div>

                <div class="input_web">
                    <label for="price">Select a Price Option:</label>
                    <input class="inp_program" type="text" id="price" required="required" placeholder="Enter your Price Option" name="price">
                </div>

                <div class="input_web">
                    <label for="note">Note:</label>
                    <textarea class="inp_descrip " name="note" id="note" cols="30" rows="2" placeholder="Enter your Note"></textarea>
                </div>

                <!--Submit-->
                <div class="input_web submit">
                    <input type="submit" name="" id="submit-btn" value="Register">
                </div>

            </form>
        </div>
    </div>
</body>

</html>