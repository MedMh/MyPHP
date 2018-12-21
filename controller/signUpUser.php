<?php
require_once '../Classes/User.php';
$uname = $_POST['uname'];
$pwd = $_POST['pwd'];
$log = $_POST['log'];
$user = new User();
$user->setLogin($log);
$user->setUsername($uname);
$user->setPassword($pwd);
$user->signUp();
header("Location: ../pages/index.html");
echo '<h1>account created</h1>';

