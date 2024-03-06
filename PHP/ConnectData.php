<?php
    //Database connection object
    $connect = new mysqli("localhost", "root", "", "web_sport");
    if($connect->connect_error){
        echo "Connection error : " . $connect -> connect_error;
    }

    session_start();
    $user_id = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : NULL;

    $stmt=$connect->prepare("SELECT _id FROM organizations WHERE owner = ?");
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    $stmt->bind_result($organization_id);
    $stmt->fetch();
    $stmt->close();

    $stmt=$connect->prepare("SELECT * FROM users WHERE _id = ?");
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    $result=$stmt->get_result();
    $data=$result->fetch_assoc();
    $stmt->close();
?>