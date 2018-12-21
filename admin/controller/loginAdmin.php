<?php
    require_once '../Classes/admin.php';
    $log = $_POST['login'];
    $pwd = $_POST['pass'];
    $ad = new admin();
    if($ad->connect($log, $pwd)){
        session_start();
        $SESSION['adminlog'] = $log;
        //echo "<h1>Welcome admin</h1>";
        header("Location: ../pages/home.html");
    }else{
        header("Location: ../pages/index.html");
    }

