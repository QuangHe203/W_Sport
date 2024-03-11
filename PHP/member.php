<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Members</title>
    <link rel="stylesheet" href="../css/member.css">
</head>
<body>
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

            if ($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['del_member']) ) {
            $del_id=$_POST['del_id'];
            if ($connect->connect_error) {

        } else {
            $stmt=$connect->prepare("DELETE FROM members WHERE _id = ?");
            $stmt->bind_param("s", $del_id);
            $stmt->execute();
        }
    }   

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
                <form action="" method="post">
              <input type="hidden" name="del_id" value="<?php echo $row['_id'];?>">
              <input type="submit" value="Delete" name="del_member">
            </form>
            </div>
        </div>

        <?php
            }
            $stmt->close();
            $connect->close();
        ?>

    </div>
    <script>
        document.getElementById("btn").addEventListener("click", function() {
            window.location.href = "../PHP/new_mem.php";
        });
    </script>
</body>
</html>

