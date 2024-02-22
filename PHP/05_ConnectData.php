<?php
    //Database connection object
    $connect = new mysqli("localhost", "root", "", "web_sport");
    if($connect->connect_error){
        echo "Connection error : " . $connect -> connect_error;
    }
?>