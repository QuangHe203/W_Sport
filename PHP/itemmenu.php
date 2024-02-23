<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Side Navigation Bar</title>
	<link rel="stylesheet" href="../css/itemmenu.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
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
                <div class="nav_profile">
                    <div class="dashboard">
                        <p class="goto"><a href="../PHP/itemmenu.php">Go to Dashboard</a></p>
                        <p><img src="../img/profile.jpg" alt=""></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="wrapper">
    <div class="sidebar">
        <ul>
            <li><a href="../PHP/dashboard.php" target="content"><i class="fas fa-home"></i>Dashboard</a></li>
            <li><a href="../php/programs.php" target="content"><i class="fas fa-address-card"></i>Programs</a></li>
            <li><a href="../php/registrations.php" target="content"><i class="fas fa-clipboard"></i>Registrations</a></li>
            <li><a href="../php/member.php" target="content"><i class="fas fa-users"></i>Members</a></li>
            <li><a href="../php/website.php" target="content"><i class="fas fa-globe"></i>Website</a></li>
        </ul> 
        
    </div>
    <div class="main_content">
        <iframe name="content" frameborder="0" width="100%" height="100%"></iframe>
    </div>
</div>

</body>
</html>