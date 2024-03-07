

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/new_mem.css">
</head>
<body>
    <?php
    require_once 'ConnectData.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];


        if ($connect->connect_error) {
            die("Connection failed: " . $connect->connect_error);
        }

        $sqlCheckEmail = "SELECT * FROM users WHERE email = '$email'";
        $resultCheckEmail = $connect->query($sqlCheckEmail);

        if ($resultCheckEmail->num_rows > 0) {
            $userData = $resultCheckEmail->fetch_assoc();

            $sqlAddMember = "INSERT INTO members (_id, organization_id, created_at, name, phone, email) 
                             VALUES ('$userData[_id]', '$organization_id', '$userData[birthday]', '$userData[username]', '$userData[phone]', '$userData[email]')";
            
            if ($connect->query($sqlAddMember) === TRUE) {
                echo "Member added successfully.";
            } else {
                echo "Error adding member: " . $connect->error;
            }
        } else {
            echo "Email does not exist. Please enter a valid email.";
        }

        $connect->close();
    }
?>

    <div class="main">
        <div class="header">New Member</div>
        <div class="create_program">
            <p class="p_enter">Enter member's email to add them to your organization</p>
            <form action="" id="new_mem" method="post">
                <div class="input_mem">
                    <label for="email">Email</label>
                    <input class="inp_mem" type="text" id="email" required="required" name="email">
                </div>

                <div class="input_mem submit">
                    <input type="submit" name="" id="submit-btn" value="Add">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
