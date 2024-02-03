<?php

    session_start();
    ob_start();
    if(isset($_SESSION['role']) && ($_SESSION['role'] == 1)){
        // tat ca code trong admin o trong nay
        echo "ADMIN";
    }else{
        header('location: login.php');
    }

?>