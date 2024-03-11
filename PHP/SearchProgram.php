<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Program</title>
    <link rel="stylesheet" href="../css/search_program.css">
    <link rel="stylesheet" href="../css/navbar.css">
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
    <div class="main">
        <div class="header">Search Public Program</div>
        <div class="items">
            <form action="" method="post" class="form-item">
                <input class="search" type="text" placeholder="Search">
                <select id="selec_program" name="sportlist" form="sportform">
                    <option value="Sport">Program</option>
                    <option value="a">A</option>
                    <option value="b">B</option>
                    <option value="c">C</option>
                </select>
                <div class="showResult">
                    
                </div>
            </form>
            
        </div>

        <?php
    require_once 'ConnectData.php';


    $stmt = $connect->prepare("SELECT programs.*, organizations.name as organization_name FROM programs INNER JOIN organizations ON programs.organization_id = organizations._id");    
        $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    while ($row = $result->fetch_assoc()) {
        
        ?>  
        <a class="container" href="../PHP/programDetail.php" >
            <div class="profile">
                <img src="../image/cau-long-vu.jpg" alt="Profile Picture">
            </div>
            <div class="info">
                <p class="program_name"><?php echo $row['title'];?></p>
                <p class="program_title">Sport: <?php echo $row['sport']?></p>
                <p class="program_organ">Organization: <?php echo $row['organization_name'];?></p>
                <p class="program_address">Location: <?php echo $row['location']?></p>
            </div>
        </a>
    
    <?php
            }

    ?> 
    </div>
    <script>
    function saveProgramId(programId) {
        <?php $_SESSION['program_id'] = $programId; ?>
    }
    </script>
    
</body>
</html>