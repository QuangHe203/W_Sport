<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link rel="stylesheet" href="../css/basicInfo.css">
</head>
<body>
    <?php
        require_once 'ConnectData.php';
        $program_id=$_SESSION['program_id'];
        
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
            $subtitle=$_POST["subtitle"];
            $description=$_POST["description"];
            $location=$_POST["location"];
            if ($connect->connect_error) {
                die('Cannot connect to database'.$connect_error);
            } else {
                $stmt=$connect->prepare("UPDATE programs SET subTitle=?, description=?, location=? WHERE _id=?");
                $stmt->bind_param("ssss", $subtitle, $description, $location, $program_id);
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
                    <label for="title">Title</label>
                    <input class="inp_program" type="text" id="title" required="required" placeholder="" name="title" value="<?php echo $row['title'];?>" readonly>
                </div>
                <div class="input_web">
                    <label for="subTitle">SubTitle </label>
                    <textarea class="inp_program" name="subtitle" id="subTitle" cols="30" rows="2" placeholder=""><?php echo $row['subTitle'];?></textarea>
                </div>
                <div class="input_web">
                    <label for="description">Description</label>
                    <textarea class="inp_descrip " name="description" id="description" cols="30" rows="2" placeholder=""><?php echo $row['description'];?></textarea>
                </div>  
                <div class="input_web">
                    <label for="location">Location</label>
                    <input class="inp_program" type="text" id="location" required="required" placeholder="" name="location" value="<?php echo $row['location'];?>">
                </div>
                <div class="input_web">
                    <label for="sport">Sport</label>
                    <input class="inp_program" type="text" id="sport" required="required" placeholder="" name="sport" value="<?php echo $row['sport'];?>" readonly>
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