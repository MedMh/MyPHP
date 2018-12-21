<?php
try{
    $cn = new PDO('mysql:host=localhost;dbname=my_php_db;charset=utf8','med','azerty');
}catch(Exception $e){
    die('Erreur: '.$e->getMessage());
}

$codeT = $_GET['id_topic'];

$cn->exec("delete from response where code_topic='$codeT'");
$cn->exec("delete from topic where code_topic='$codeT'");

header ("Location: ../pages/forum.html");