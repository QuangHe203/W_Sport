<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/website.css">
</head>
<body>
    <?php
    require_once 'ConnectData.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $organization_name = $_POST["title"];
        $tagline = $_POST["tagline"];
        $description = $_POST["description"];
        $address = $_POST["address"];

        $sqlInsert = "INSERT INTO website (organization_name, tagline, description, address) 
                      VALUES ('$organization_name', '$tagline', '$description', '$address')";

        if ($connect->query($sqlInsert) === TRUE) {
            echo "Record inserted successfully.";
        } else {
            echo "Error inserting record: " . $connect->error;
        }

        $connect->close();
    }
?>

    
    <div class="main">
        <div class="header">Website Information</div>
        <div class="create_web">
            <form action="" id="new_web" method="post">
                <div class="input_web">
                    <label for="title">Organization name:</label>
                    <input class="inp_program" type="text" id="title" required="required" placeholder="Enter your Organization Name" name="title">
                </div>

                <div class="input_web">
                    <label for="tagline">Tagline </label>
                    <textarea class="inp_program" name="tagline" id="tagline" cols="30" rows="2" placeholder="Enter your Tagline"></textarea>
                </div>

                <div class="input_web">
                    <label for="description">Description</label>
                    <textarea class="inp_descrip" name="description" id="description" cols="30" rows="2" placeholder="Enter your Description"></textarea>
                </div>  

                <div class="input_web">
                    <label for="Address">Address</label>
                    <input class="inp_program" type="text" id="address" required="required" placeholder="Enter your Address" name="address">
                </div>

                <!--Submit-->
                <div class="input_web submit">
                    <input type="submit" name="" id="submit-btn" value="Save">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
