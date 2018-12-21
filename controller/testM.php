<?php
    session_start();

    try{
    $cn = new PDO('mysql:host=localhost;dbname=my_php_db;charset=utf8','med','azerty');
    }catch(Exception $e){
    die('Erreur: '.$e->getMessage());
    }
    $log = $_SESSION["login"];
    require_once '../Classes/User.php';
    $a = $_POST["q1"];
    $b = $_POST["q2"];
    $c = $_POST["q3"];
    $d = $_POST["q4"];
    $e = $_POST["q5"];
    $f = $_POST["q6"];
    $g = $_POST["q7"];
    $h = $_POST["q8"];
    $i = $_POST["q9"];
    $j = $_POST["q10"];
    $reponses = array($a,$b,$c,$d,$e,$f,$g,$h,$i,$j);
    $correction = array("a","c","b","c","c","a","b","c","b","a");
    $score = 0;
    for($cmt = 0;$cmt<10;$cmt++){
        if($reponses[$cmt]==$correction[$cmt]){
            $score++;
        }
    }
    if($score>=7){
        //echo "félicitation, votre score est: $score/10 et vous avez passé ce niveau.";
        $cn->exec("update user set level_cl='A' where login='$log'");
        echo "<script type=\"text/javascript\">alert(\"félicitation, votre score est: $score/10 et vous avez passé ce niveau.\")</script>";
        echo "<script type=\"text/javascript\">document.location=\"../pages/formation.html\";</script>";
    }else{
        //echo "votre score est $score/10, vous devez relire le cours et passé le test aprés.";
        echo "<script type=\"text/javascript\">alert(\"votre score est $score/10, vous devez relire le cours et passé le test aprés.\")</script>";
        echo "<script type=\"text/javascript\">document.location=\"../pages/formation.html\";</script>";
        }
    //header("Location: ../pages/formation.html");
    

