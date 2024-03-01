<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/registration_setting.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php
        require_once 'ConnectData.php';

        if ($_SERVER["REQUEST_METHOD"]=="POST") {
            $name_email = isset($_POST["requiredName_email"]) ? $_POST["requiredName_email"] : false;
            $phone=isset($_POST["requiredPhone"]) ? $_POST["requiredPhone"] : false;
            $birthday=isset($_POST["requiredBirthday"]) ? $_POST["requiredBirthday"] : false;
            $gender=isset($_POST["requiredGender"]) ? $_POST["requiredGender"] : false;
            $individualPlayer=isset($_POST["IndividualPlayer"]) ? $_POST["IndividualPlayer"] : false;
            $teamPlayer=isset($_POST["TeamPlayer"]) ? $_POST["TeamPlayer"]: false;
            $coach=isset($_POST["Coach"]) ? $_POST["Coach"] : false;
            $staff=isset($_POST["staff"]) ? $_POST["staff"] : false;
            $individual=isset($_POST["Individual"]) ? $_POST["Individual"] : false;
            $startDate=isset($_POST["startDate"]) ? $_POST["startDate"] : false;
            $startTime=isset($_POST["startTime"]) ? $_POST["startTime"] : false;
            $endDate=isset($_POST["endDate"]) ? $_POST["endDate"] : false;
            $endTime=isset($_POST["endTime"]) ? $_POST["endTime"] : false;

            $stmt=$connect->prepare("INSERT INTO registrationRequires (program_id, name_email, phone, birthday, gender, individualPlayer, teamPlayer, coach, staff, individual, startDate, startTime, endDate, endTime) value(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssssssssssss", $program_id, $name_email, $phone, $birthday, $gender, $individualPlayer, $teamPlayer, $coach, $staff, $individual, $startDate, $startTime, $endDate, $endTime);
            if ($stmt->execute()) {
                header("Location: Teamgroup.php");
            } else {
                echo "Error".$stmt->error;
            }
            $stmt->close();
            $connect->close();
        }

    ?>
    <form action="" method="post">
        <div class="main">
            <div class="enable">
                <label class="switch">
                    <input type="checkbox" name="openRegister" id="openRegister">
                    <span class="slider round"></span>
                </label>
                <p class="text">Enable & Public Registration Online for this Program</p>
            </div>
            
    
            <div class="option">
                <p class="header">Require options: </p>
                <div class="required">
                    <label class="required_checkbox">
                        <input type="checkbox" name="requiredName_email" id="requiredName_email">
                        <p>Require name, email</p>
                    </label>
    
                    <label class="required_checkbox">
                        <input type="checkbox" name="requiredPhone" id="requiredPhone">
                        <span class="checkbox_custom"></span>
                        <p>Require phone</p>
                    </label>
    
                    <label class="required_checkbox">
                        <input type="checkbox" name="requiredGender" id="requiredGender">
                        <span class="checkbox_custom"></span>
                        <p>Require gender</p>
                    </label>
    
                    <label class="required_checkbox">
                        <input type="checkbox" name="requiredBirthday" id="requiredBirthday">
                        <span class="checkbox_custom"></span>
                        <p>Require birthday</p>
                    </label>
                </div>
                
            </div>
    
            <div class="option">
                <p class="header">Role options for register: </p>
                <div class="required">
                    <label class="required_checkbox">
                        <input type="checkbox" name="IndividualPlayer" id="IndividualPlayer">
                        <p>Register as Individual Player</p>
                    </label>
    
                    <label class="required_checkbox">
                        <input type="checkbox" name="TeamPlayer" id="TeamPlayer">
                        <span class="checkbox_custom"></span>
                        <p>Register as Team Player</p>
                    </label>
    
                    <label class="required_checkbox">
                        <input type="checkbox" name="Coach" id="Coach">
                        <span class="checkbox_custom"></span>
                        <p>Register as Coach</p>
                    </label>
    
                    <label class="required_checkbox">
                        <input type="checkbox" name="staff" id="staff">
                        <span class="checkbox_custom"></span>
                        <p>Register as Staff</p>
                    </label>
    
                    <label class="required_checkbox">
                        <input type="checkbox" name="Individual" id="Individual">
                        <span class="checkbox_custom"></span>
                        <p>Register as Individual</p>
                    </label>
                </div>
            </div>
            <div class="setUp">
                <p class="header">SetUp Start & End Date for Register</p>
                <div class="start">
                    <div class="start_date">
                        <label for="">Start Date*</label>
                        <input type="date" name="startDate" id="starDate">
                    </div>
                    <div class="start_time">
                        <label for="">Start Time*</label>
                        <input type="time" name="startTime" id="starTime">
                    </div>
                </div>
    
                <div class="end">
                    <div class="end_date">
                        <label for="">End Date</label>
                        <input type="date" name="endDate" id="endDate">
                    </div>
                    <div class="end_time">
                        <label for="">End Time</label>
                        <input type="time" name="endTime" id="endTime">
                    </div>
                </div>
            </div>
    
            <div class="price">
                <p class="header">Price Options:</p>
                <p>Press <span><i class="fa fa-plus-circle"></i></span> to add a new Price Option</p>
                <div class="price_option">
                    <div class="name_options">
                        <p class="header_options">Price Name</p>
                        <p class="header_options">Price Number</p>
                        <p class="header_options">Price Quanlity</p>
                        <p class="header_options">Visilable</p>
                        <p class="header_options">Action</p>
                    </div>
                    <span class="space"></span>
                    <div class="price_item">
                        <p class="pri_name">Individual Fee</p>
                        <p class="pri_num">1110000</p>
                        <p class="pri_quanl">1000</p>
                        <p class="visil">
                            <label class="switch">
                                <input type="checkbox" name="" id="">
                                <span class="slider round"></span>
                            </label>
                        </p>
                        <p class="actio">
                            <i class="fas fa-trash"></i>
                        </p>
                    </div>
                    <div class="price_item">
                        <p class="pri_name">Free</p>
                        <p class="pri_num">0</p>
                        <p class="pri_quanl">1000</p>
                        <p class="visil">
                            <label class="switch">
                                <input type="checkbox" name="" id="">
                                <span class="slider round"></span>
                            </label>
                        </p>
                        <form action="">
                            <p class="actio">
                                <i class="fas fa-trash"></i>
                            </p>
                        </form>
                        
                    </div>
                    <!--Submit-->
                    <div class="input_web submit">
                        <input type="submit" name="" id="submit-btn" value="Save All">
                    </div>
        
                </div>
            </div>
        </div>
    </form>
    
</body>
</html>