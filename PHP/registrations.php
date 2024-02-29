<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrations</title>
  <link rel="stylesheet" href="../css/registrations.css">
</head>
<body>
  <?php
    require_once 'ConnectData.php'; 

    $stmt = $connect->prepare("SELECT * FROM registrations");
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
  ?>
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
          <p>Summer Football 2024</p>
          <p><strong>User ID:</strong> <?php echo $row['user_id']; ?></p>
          <p><?php echo $row['organization_id']; ?></p>
          <div class="info_mem">
            <p><?php echo $row['role']; ?></p>
            <p><?php echo $row['team']; ?></p>
            <p class="active"><?php echo $row['note']; ?></p>
          </div>
          <p class="more-link" onclick="toggleMore()">More...</p>
        </div>
      </div>
      <?php
        }
      ?>
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
