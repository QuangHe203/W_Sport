<?php
if (isset($_POST['action'])) {

    if ($_POST['action'] == 'fetchData') {
        $query = "SELECT * FROM programs ORDER BY _id DESC";
        getData($query);
    }

    if ($_POST['action'] == 'searchRecord') {
        $program_title = $_POST['program_title'];
        $query = "SELECT * FROM programs WHERE title LIKE '%$program_title%' ORDER BY _id DESC";
        getData($query);
    }

    if ($_POST['action'] == 'searchBySport') {
        $program_sport = $_POST['program_sport'];

        $query = "SELECT * FROM programs WHERE sport = '$program_sport'";
        getData($query);
    }

    if ($_POST['action'] == 'searchByType') {
        $program_type = $_POST['program_type'];

        $query = "SELECT * FROM programs WHERE type = '$program_type'";
        getData($query);
    }
}

function getData($query)
{
    include("ConnectData.php");
    $output = "";
    $total_row = mysqli_query($connect, $query) or die('error');
    if (mysqli_num_rows($total_row) > 0) {
        foreach ($total_row as $row) {
            $output .= '
                <div class="container" id="program_inf">
                    <div class="profile">
                        <img src="../image/cau-long-vu.jpg" alt="Profile Picture">
                    </div>
                    <div class="info">
                        <p class="program_name">' . $row['title'] . '</p>
                        <p class="program_title">' . $row['subTitle'] . '</p>
                        <form action="" method="post" class="actionForm">
                            <p class="program_time">' . formatDate($row['startDate']) . '</p>';

            if ($row['openRegister'] == 1) {
                $output .= '<p class="program_sta">Published</p>';
            } else {
                $output .= '<p class="program_sta" style="color: red;">Unpublished</p>';
            }

            $output .= '
                            <input type="hidden" name="del_id" value="' . $row['_id'] . '">
                            <input type="submit" class="del_program" value="Delete" name="delete">
                        </form>
                        <form action="" method="post">
                            <input type="hidden" id="program_id" name="program_id" value="' . $row['_id'] . '">
                            <input type="submit" id="bt_edit" class="more-link" value="Edit" name="edit">
                        </form>
                    </div>
                </div>
                ';
        }
    } else {
        $output = "<h4>Data not found</h4>";
    }
    echo $output;
}
