<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/newprogram.css">
</head>
<body>
    <?php
        require_once 'ConnectData.php';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $title=$_POST["title"];
            $sport=$_POST["sport"];
            $program=$_POST["program"];
            if ($connect->connect_error) {
                die('Cannot connect to database'.$connect_error);
            } else {
                $stmt=$connect->prepare("INSERT INTO programs (title, sport, type, organization_id) value (?, ?, ?, ?)");
                $stmt->bind_param("ssss", $title, $sport, $program, $organization_id);
            }
            if ($stmt->execute()) {
                $_SESSION["program_id"]=$stmt->insert_id;
                header("Location: programs.php");
                exit();
            } else {
                echo "Error".$stmt->error;
            }
            $stmt->close();
        }
    ?>
    <div class="main">
        <div class="header">New Program</div>
        <div class="create_program">
            <form id="new_program" method="POST">
                <div class="input_program">
                    <label for="title">Title</label>
                    <input class="inp_program" type="text" id="title" required="required" placeholder="Enter your Title" name="title">
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
    
                <!--Submit-->
                <div class="input_program submit">
                    <input type="submit" id="submit-btn" value="Create">
                </div>
    
            </form>
        </div>
    </div>
    
</body>
</html>