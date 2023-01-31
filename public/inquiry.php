<?php
    require('../src/config.php');
    include('./layout/header.php');

    $message="";
    $deletemessage="";

    
    if (!isset($_SESSION['userid'])) {
        print_r($_SESSION);
        header('Location: login.php?mustLogin');
        exit;
    }

    

?>