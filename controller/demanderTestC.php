<?php
require_once '../Classes/TestC.php';
session_start();
$login = $_SESSION['login'];
try{
    $cn = new PDO('mysql:host=localhost;dbname=my_php_db;charset=utf8','med','azerty');
}catch(Exception $e){
    die('Erreur: '.$e->getMessage());
}
$res = $cn->query('select * from test_c');
$nbtest = 0;
if($res->rowCount()>0){
    $nbtest = $res->rowCount();
}
$nbtest++;
$codeTest = "TestC$nbtest";
$testc = new TestC();
$testc->setCodeTest($codeTest);
$testc->setLogin($login);
$testc->addTest();
//echo "Your request has been sent to the website admin. We will informe you when your test is ready.";
echo "<script type=\"text/javascript\">alert(\"Your request has been sent to the website admin. We will informe you when your test is ready.\")</script>";
echo "<script type=\"text/javascript\">document.location=\"../pages/formation.html\";</script>";