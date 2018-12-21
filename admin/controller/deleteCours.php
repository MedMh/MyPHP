<?php
try{
    $cn = new PDO('mysql:host=localhost;dbname=my_php_db;charset=utf8','med','azerty');
}catch(Exception $e){
    die('Erreur: '.$e->getMessage());
}

$codeC = $_GET['id_cours'];


$cn->exec("delete from cours where code_cours='$codeC'");

header ("Location: ../pages/formation.html");