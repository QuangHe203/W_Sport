<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/settings.css">
</head>
<body>
    <div class="navbar">
        <div class="navbar-content">
            <div class="navbar-item">
                <div class="logo">
                    <a href="../PHP/Index.php" class="logo-title"> 
                        <h2 title="Sport Management">SportManagement</h2>
                    </a>
                </div>
    
                <!--khi da dang nhap, hien thi profile-->
                <div></div>
    
    
            </div>
        </div>
    </div>

    <div class="setting_Title">
        <h2>Summer Fooball 2024</h2>
    </div>

    <div class="menu">
        <ul>
            <li><a href="">Basic Info</a></li>
            <li><a href="">Setup Times</a></li>
            <li><a href="">Registration</a></li>
            <li><a href="">Team & Group</a></li>
            <li><a href="">Schedule</a></li>
        </ul>
    </div>

    <div class="main">
        <div class="settings-content">
            <form action="" id="form-organization" method="post">
                <div class="input-title">
                    <label for="title">Title</label>
                    <input class="inp_title" type="text" id="title" required="required" placeholder="Enter your sport title" name="title">
                </div>

                <div class="input-title">
                    <label for="subtitle">SubTitle</label>
                    <input class="inp_title" type="text" id="subtitle" required="required" placeholder="Enter your SubTitle Sport" name="subtitle">
                </div>
                <div class="input-title">
                    <label for="description">Description</label>
                    <input class="inp_title" type="text" id="description" required="required" placeholder="Enter your Description" name="description">
                </div>
                <div class="input-title">
                    <label for="location">Location</label>
                    <input class="inp_title" type="text" id="location" required="required" placeholder="Enter your Location" name="location">
                </div>
                <div class="input-title">
                    <label for="sport">Sport</label>
                    <input class="inp_title" type="text" id="sport" required="required" placeholder="Enter your Sport" name="sport">
                </div>
                <!--Submit-->
                <div class="input-organ submit">
                    <input type="submit" name="" id="submit-btn" value="Save">
                </div>

            </form>
        </div>
    </div>
</body>
</html>