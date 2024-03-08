<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Side Navigation Bar</title>
	<link rel="stylesheet" href="../css/itemmenu.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script>
        function loadPage(url) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("content").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", url, true);
            xhttp.send();
        }
    </script>


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

                <?php
                    require_once 'ConnectData.php';

                    if (isset($_SESSION["user_id"])) { 
                        echo '<div class="nav_profile">
                                <div class="items">
                                    <a href="../PHP/Profile.php" class="sign_up"><img src="../Image/profile.jpg" alt="User Avatar" class="user-avatar"></a>

                                    <a href=../PHP/Logout.php class="sign_in">Logout</a>
                                </div>
                            </div>';
                    } else {
                        echo '<div class="nav_profile">
                                <div class="items">
                                    <p class="goto"><a href="../PHP/itemmenu.php">Go to Dashboard</a></p>
                                    <p><img src="../img/profile.jpg" alt=""></p>
                                </div>
                            </div>';
                    }
                ?>
            </div>
        </div>
    </div>

<div class="wrapper">
    <div class="sidebar" id="sidebar">
        <!-- <ul>
            <li><a href="../PHP/dashboard.php" target="content"><i class="fas fa-home"></i>Dashboard</a></li>
            <li><a href="../php/programs.php" target="content"><i class="fas fa-address-card"></i>Programs</a></li>
            <li><a href="../php/registrations.php" target="content"><i class="fas fa-clipboard"></i>Registrations</a></li>
            <li><a href="../php/member.php" target="content"><i class="fas fa-users"></i>Members</a></li>
            <li><a href="../php/website.php" target="content"><i class="fas fa-globe"></i>Website</a></li>
        </ul>  -->
        <ul>
            <li><a href="#" onclick="loadPage('../PHP/dashboard.php')"><i class="fas fa-home"></i>Dashboard</a></li>
            <li><a href="#" onclick="loadPage('../PHP/programs.php')"><i class="fas fa-address-card"></i>Programs</a></li>
            <li><a href="#" onclick="loadPage('../PHP/registrations.php')"><i class="fas fa-clipboard"></i>Registrations</a></li>
            <li><a href="#" onclick="loadPage('../PHP/member.php')"><i class="fas fa-users"></i>Members</a></li>
            <li><a href="#" onclick="loadPage('../PHP/website.php')"><i class="fas fa-globe"></i>Website</a></li>
        </ul> 
    </div>
    <div class="main_content" id="content">
        <!-- <iframe name="content" id="oldIframe" frameborder="0" width="100%" height="100%"></iframe> -->
    </div>
</div>

</body>
<!-- <script>
    window.onload = function() {
        var iframe = document.getElementsByName("content")[0];
        iframe.src = "../PHP/dashboard.php";
    };
</script> -->
</html>