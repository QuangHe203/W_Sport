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
    <form action="" method="post">
        <div class="main">
            <div class="enable">
                <label class="switch">
                    <input type="checkbox" name="" id="">
                    <span class="slider round"></span>
                </label>
                <p class="text">Enable & Public Registration Online for this Program</p>
            </div>
            
    
            <div class="option">
                <p class="header">Require options: </p>
                <div class="required">
                    <label class="required_checkbox">
                        <input type="checkbox" name="requiredCheck" id="requiredCheck">
                        <p>Require name, email</p>
                    </label>
    
                    <label class="required_checkbox">
                        <input type="checkbox" name="requiredCheck" id="requiredCheck">
                        <span class="checkbox_custom"></span>
                        <p>Require phone</p>
                    </label>
    
                    <label class="required_checkbox">
                        <input type="checkbox" name="requiredCheck" id="requiredCheck">
                        <span class="checkbox_custom"></span>
                        <p>Require gender</p>
                    </label>
    
                    <label class="required_checkbox">
                        <input type="checkbox" name="requiredCheck" id="requiredCheck">
                        <span class="checkbox_custom"></span>
                        <p>Require birthday</p>
                    </label>
                </div>
                
            </div>
    
            <div class="option">
                <p class="header">Role options for register: </p>
                <div class="required">
                    <label class="required_checkbox">
                        <input type="checkbox" name="requiredCheck" id="requiredCheck">
                        <p>Register as Individual Player</p>
                    </label>
    
                    <label class="required_checkbox">
                        <input type="checkbox" name="requiredCheck" id="requiredCheck">
                        <span class="checkbox_custom"></span>
                        <p>Register as Team Player</p>
                    </label>
    
                    <label class="required_checkbox">
                        <input type="checkbox" name="requiredCheck" id="requiredCheck">
                        <span class="checkbox_custom"></span>
                        <p>Register as Coach</p>
                    </label>
    
                    <label class="required_checkbox">
                        <input type="checkbox" name="requiredCheck" id="requiredCheck">
                        <span class="checkbox_custom"></span>
                        <p>Register as Staff</p>
                    </label>
    
                    <label class="required_checkbox">
                        <input type="checkbox" name="requiredCheck" id="requiredCheck">
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
                        <input type="date" name="" id="starDate">
                    </div>
                    <div class="start_time">
                        <label for="">Start Time*</label>
                        <input type="time" name="" id="starTime">
                    </div>
                </div>
    
                <div class="end">
                    <div class="end_date">
                        <label for="">End Date</label>
                        <input type="date" name="" id="endDate">
                    </div>
                    <div class="end_time">
                        <label for="">End Time</label>
                        <input type="time" name="" id="endTime">
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