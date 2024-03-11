<?php
    require_once 'ConnectData.php';

    if(isset($_POST['input']) && !empty($_POST['input'])) {

        $input = $_POST['input'];

        $query = "SELECT * FROM users WHERE username LIKE '%" . $input . "%' ";

        $result = mysqli_query($connect, $query);

        if(mysqli_num_rows($result) > 0) {
        ?>
        
        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>UserName</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($row = mysqli_fetch_assoc($result)) {
                    $id = $row['_id'];
                    $userName = $row['username'];
                    $name = $row['name'];
                    $email = $row['email'];
                ?>
                
                <tr>
                    <td><?php echo $id;?></td>
                    <td><?php echo $userName;?></td>
                    <td><?php echo $name;?></td>
                    <td><?php echo $email;?></td>
                </tr>

                <?php
                }
                ?>
            </tbody>
        </table>

        <?php
        } else {
            echo "<h6 class='text-danger text-center mt-3'>No data</h6>";
        }
    }
?>