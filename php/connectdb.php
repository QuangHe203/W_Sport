<?php

    function connectdb(){
        $servername = "localhost";
        $username = "root";
        $password = "";
 
        try {
            $conn = new PDO("mysql:host=$servername;dbname=db_test", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
        }   catch(PDOException $e) {
            // echo "Connection failed: " . $e->getMessage();
        }
        return $conn;
    }


    /*
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "db_test";
    $conn= mysqli_connect($servername,$username, $password, $db);

    if(mysqli_connect_errno()){
	    echo "Connection Fail: " .mysqli_connect_errno(); exit;
    }
    */
?>