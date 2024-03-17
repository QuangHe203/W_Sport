<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrations</title>
  <link rel="stylesheet" href="../css/registrations.css">
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>

<body>
  <?php
  require_once 'ConnectData.php';

    $stmt = $connect->prepare("SELECT * FROM registrations");
    $stmt->execute();
    $result = $stmt->get_result();

    if ($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['del_registration']) ) {
      $del_id=$_POST['del_id'];
      if ($connect->connect_error) {

      } else {
        $stmt=$connect->prepare("DELETE FROM registrations WHERE _id = ?");
        $stmt->bind_param("s", $del_id);
        $stmt->execute();
        $stmt->close();
      }
    }
    
    

  if ($result->num_rows > 0) {
  ?>

  <div class="navbar">
        <div class="navbar-content">
            <div class="navbar-item">
                <div class="logo">
                    <a href="index.php" class="logo-title"> 
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
          <div class="header">Registrations</div>
          <div class="items">
            <form action="search_" method="post" class="form-item">
              <input class="search" type="text" placeholder="Search">
              <select id="sport" name="sportlist" form="sportform">
                <option value="Sport">All</option>
                <option value="a">A</option>
                <option value="b">B</option>
                <option value="c">C</option>
              </select>
              <select id="all" name="all" form="all">
                <option value="all">All</option>
                <option value="a">A</option>
                <option value="b">B</option>
                <option value="c">C</option>
              </select>
            </form>

      <?php
        while ($row = $result->fetch_assoc()) {
      ?>
      <div class="container">
        <div class="profile">
          <img src="../image/profile-icon-design-free-vector.jpg" alt="Profile Picture">
        </div>
        <div class="info">
          <p><strong>Program ID:</strong> <?php echo $row['program_id']; ?></p>
          <p></p>
          <p>Name: <?php echo $row['name'];?></p>
          <p><strong>User ID:</strong> <?php echo $row['user_id']; ?></p>
          <p><?php echo $row['organization_id']; ?></p>
          <div class="info_mem">
            <p><?php echo $row['role']; ?></p>
            <p><?php echo $row['team']; ?></p>
            <p class="active"><?php echo $row['note']; ?></p>
          </div>
          <form action="" method="post">
              <input type="hidden" name="del_id" value="<?php echo $row['_id'];?>">
              <input type="submit" value="Delete" name="del_registration">
            </form>
        </div>
      </div>
      <?php
        }
      ?>
    </div>
  </div>
        </div>
  </div>

  
  <?php
  } else {
    echo "No data found";
  }

    $stmt->close();
    
    $connect->close();
  ?>
</body>

</html>