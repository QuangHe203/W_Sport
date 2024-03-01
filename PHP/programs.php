<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programs</title>
    <link rel="stylesheet" href="../css/programs.css">
</head>
<body>
    <?php
        require_once 'ConnectData.php';

        if ($connect->connect_error) {
            die('Cannot connect to database'.$connect->connect_error);
        } else {
            $stmt = $connect->prepare("SELECT * FROM programs WHERE organization_id = ?");
            $stmt->bind_param("s", $organization_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $rowCount = $result->num_rows;
            $stmt->close();
        }
    ?>
    <div class="main">
        <div class="header">Programs</div>
        <div class="items">
            <form action="" method="post" class="form-item">
                <input class="search" type="text" placeholder="Search">
                <select id="sport" name="sportlist" form="sportform">
                    <option value="Sport">Sport</option>
                    <option value="League">League</option>
                    <option value="b">B</option>
                    <option value="c">C</option>
                </select>

                <select id="all" name="all" form="all">
                    <option value="all">All</option>
                    <option value="a">A</option>
                    <option value="b">B</option>
                    <option value="c">C</option>
                </select>


                <input id="btn" type="button" value="Create Program">
            </form>
            
        </div>
    </div>
    <?php
        if ($rowCount > 0) {
            while ($infor = $result->fetch_assoc()) {
    ?>
        <div class="container">
            <div class="profile">
                <img src="../image/cau-long-vu.jpg" alt="Profile Picture">
            </div>
            <div class="info">
                <p class="program_name"><?php echo $infor['title'];?></p>
                <p class="program_title"><?php echo $infor['subTitle'];?></p>
                <form action="" method="post" class="actionForm">
                    <p class="program_time"><?php echo $infor['startDate'];?></p>
                    <p class="program_sta">Published</p>
                    <p class="del_program">Delete</p>
                    <p class="more-link" onclick="toggleMore()">More</p>
                </form>
            </div>
        </div>        
    <?php
                    
        }
    }
    ?>
    <script>
        document.getElementById("btn").addEventListener("click", function() {
            window.location.href = "../PHP/newprogram.php";
        });
    </script>
</body>
</html>