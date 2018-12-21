<?php
session_start();
try{
    $cn = new PDO('mysql:host=localhost;dbname=my_php_db;charset=utf8','med','azerty');
}catch(Exception $e){
    die('Erreur: '.$e->getMessage());
}
$log = $_SESSION['login'];
$res = $cn->query("select * from test_c t, question q where t.code_test=q.code_test and t.login='$log'");

$correction = array();
$i = 0;
while($donnee = $res->fetch()){
    $correction[$i]=$donnee['rep_just'];
    $i++;
    $cdt = $donnee['code_test'];
}


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

$score = 0;
    for($cmt = 0;$cmt<10;$cmt++){
        if($reponses[$cmt]==$correction[$cmt]){
            $score++;
        }
    }
    if($score>=7){
        //echo "félicitation, votre score est: $score/10 et vous avez passé le test finale.";
        echo "<script type=\"text/javascript\">alert(\"félicitation, votre score est: $score/10 et vous avez passé le test finale.\")</script>";
        $cn->exec("update test_c set etat='S' where code_test='$cdt'");
    }else{
        echo "<script type=\"text/javascript\">alert(\"désolé, vous avez ratter votre chance d'avoir une certificat içi.\")</script>";
        //echo "désolé, vous avez ratter votre chance d'avoir une certificat içi.";
        $cn->exec("update test_c set etat='F' where code_test='$cdt'");
    }
    echo "<script type=\"text/javascript\">document.location=\"../pages/boite.html\";</script>";