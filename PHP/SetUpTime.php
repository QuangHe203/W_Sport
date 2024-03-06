<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setting</title>
    <link rel="stylesheet" href="../css/setuptime.css">
</head>
<body>
    <?php
        require_once 'ConnectData.php';
        $program_id=$_SESSION["program_id"];

        if ($connect->connect_error) {
            die('Cannot connect to database'.$connect_error);
        } else {
            $stmt=$connect->prepare("SELECT * FROM programs WHERE _id = ?");
            $stmt->bind_param("s", $program_id);
            $stmt->execute();
            $result=$stmt->get_result();
            $row=$result->fetch_assoc();
            $stmt->close();
        }

        if ($_SERVER["REQUEST_METHOD"]=="POST") {
            $startDate=$_POST["startDate"];
            $dailyStart=$_POST["dailyTime"];
            $duration=$_POST["perMatch"];
            $dailyMatch=$_POST["perDay"];
            if ($connect->connect_error) {
                die('Cannot connect to database'.$connect_error);
            } else {
                $stmt=$connect->prepare("UPDATE programs SET startDate=?, dailyStart=?, duration=?, dailyMatch=? WHERE _id=?");
                $stmt->bind_param("sssss", $startDate, $dailyStart, $duration, $dailyMatch, $program_id);
            }
            if ($stmt->execute()) {
                $stmt->close();
                header("Location: SetUpTime.php");
                exit();
            } else {
                echo "Error".$stmt->error;
            }
        }
    ?>
    <div class="main">
        <div class="create_web">
            <form action="" id="new_web" method="post">
                <div class="input_web">
                    <label for="startDate">Start Date</label>
                    <input class="inp_program" type="date" id="startDate" required="required" placeholder="" name="startDate" value="<?php echo $row['startDate'];?>">
                </div>
                <div class="input_web">
                    <label for="dailyTime">Daily Start Time </label>
                    <input class="inp_program" type="time" id="dailyTime" required="required" placeholder="" name="dailyTime" value="<?php echo $row['dailyStart'];?>">
                </div>
                <div class="input_web">
                    <label for="perMatch">Duration Per Match</label>
                    <input class="inp_program" type="text" id="perMatch" required="required" placeholder="" name="perMatch" value="<?php echo $row['duration'];?>">
                    <p class="note">Minutes between each match</p>
                </div>  
                
                <div class="input_web">
                    <label for="perDay">Match Per Day</label>
                    <input class="inp_program" type="text" id="perDay" required="required" placeholder="" name="perDay" value="<?php echo $row['dailyMatch'];?>">
                </div>
    
                <!--Submit-->
                <div class="input_web submit">
                    <input type="submit" name="" id="submit-btn" value="Save">
                </div>
    
            </form>
        </div>
    </div>
</body>
</html>