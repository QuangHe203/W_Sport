<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Members</title>
    <link rel="stylesheet" href="../css/member.css">
</head>
<body>
    <div class="navbar">
        <div class="navbar-content">
            <div class="navbar-item">
                <div class="logo">
                    <a href="index.html" class="logo-title"> 
                        <h2 title="Sport Management">SportManagement</h2>
                    </a>
                </div>
    
                <!--khi đã đăng nhập, hiển thị profile-->
                <div class="nav_profile">
                    <div class="items">
                        <a href="../PHP/Profile.php" class="sign_up"><img src="../Image/profile.jpg" alt="User Avatar" class="user-avatar"></a>

                        <a href=../PHP/Logout.php class="sign_in">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="wrapper">
        <div class="sidebar" id="sidebar">
            <ul>
                <li><a href="../PHP/dashboard.php" target="content"><i class="fas fa-home"></i>Dashboard</a></li>
                <li><a href="../php/programs.php" target="content"><i class="fas fa-address-card"></i>Programs</a></li>
                <li><a href="../php/registrations.php" target="content"><i class="fas fa-clipboard"></i>Registrations</a></li>
                <li><a href="../php/member.php" target="content"><i class="fas fa-users"></i>Members</a></li>
                <li><a href="../php/website.php" target="content"><i class="fas fa-globe"></i>Website</a></li>
            </ul>
        </div>

        <div class="main_content" id="content">
        <div class="main">
            <div class="header">Members</div>
            <div class="items">
                <form action="" method="post" class="form-item">
                    <input class="search" type="text" placeholder="Search">
                    <select id="lastest" name="sportlist" form="sportform">
                        <option value="Sport">Lastest</option>
                        <option value="a">A</option>
                        <option value="b">B</option>
                        <option value="c">C</option>
                    </select>
                    <input id="btn" type="button" value="Add Member">
                </form>
            </div>

            <?php
                require_once 'ConnectData.php';

                $stmt = $connect->prepare("SELECT * FROM members");
                $stmt->execute();
                $result = $stmt->get_result();

                while ($row = $result->fetch_assoc()) {
            ?>

            <div class="container">
                <div class="profile">
                    <img src="../image/profile-icon-design-free-vector.jpg" alt="Profile Picture">
                </div>
                <div class="info">
                    <p><strong>Name:</strong> <?php echo $row['name']; ?></p>
                    <p><strong>Organization ID:</strong> <?php echo $row['organization_id']; ?></p>
                    <p><strong>Created At:</strong> <?php echo $row['created_at']; ?></p>
                    <p><strong>Email:</strong> <?php echo $row['email']; ?></p>
                    <p><strong>Phone:</strong> <?php echo $row['phone']; ?></p>
                
                    <p class="more-link" onclick="toggleMore()">More...</p>
                </div>
            </div>

            <?php
                }
                $stmt->close();
                $connect->close();
            ?>

        </div>
            </div>
    </div>

    
    <script>
        document.getElementById("btn").addEventListener("click", function() {
            window.location.href = "../PHP/new_mem.php";
        });
    </script>
</body>
</html>

