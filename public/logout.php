<?php
    session_start();
    require('../src/config.php');

    $_SESSION = [];
    session_destroy();
    header('location:login.php?logout');
    exit;