<?php
    session_start();
    session_unset();
    session_destroy();
    header("Location: 01_Index.php");
    exit();
?>