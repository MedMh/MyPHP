<?php
    require_once '../Classes/User.php';
    $uname = $_POST['login'];
    $pwd = $_POST['pass'];
    $u = new User();
    if($u->login($uname,$pwd)){
        session_start();
        $_SESSION["login"] = $uname;
        header("Location: ../pages/home.html");
        //echo "<h1>Welcome</h1>";
    }else{
        header("Location: ../pages/index.html");
        //echo "<h1>wrong</h1>";
    }
