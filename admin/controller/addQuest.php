<?php
require_once '../Classes/Question.php';
require_once '../Classes/TestC.php';

session_start();

try{
    $cn = new PDO('mysql:host=localhost;dbname=my_php_db;charset=utf8','med','azerty');
}catch(Exception $e){
    die('Erreur: '.$e->getMessage());
}

$cmpt = $_SESSION['compteur'];
$cmpt++;
$_SESSION['compteur'] = $cmpt;

$cdt = $_SESSION['codeTest'];
$en = $_POST['enonce'];
$rj = $_POST['rj'];
$a = $_POST['a'];
$b = $_POST['b'];
$c = $_POST['c'];
$codequest = "q$cdt$cmpt";

$q = new Question();

$q->setCode_quest($codequest);
$q->setEnonce($en);
$q->setRepj($rj);
$q->setRepa($a);
$q->setRepb($b);
$q->setRepc($c);
$q->setCodeTest($cdt);
$q->addQuestion();

if($cmpt<10){
    header("Location: ../pages/ajouter_testC.html");
}else{
    unset($_SESSION['compteur']);
    
    $cn->exec("update test_c set etat='R' where code_test='$cdt'");
    
    echo "<script type=\"text/javascript\">alert(\"The test is ready and it will be sent to the candidat.\")</script>";
    echo "<script type=\"text/javascript\">document.location=\"../pages/boite.html\";</script>";
}