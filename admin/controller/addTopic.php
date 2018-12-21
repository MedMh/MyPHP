<?php
    require_once '../Classes/Connector.php';
    require_once '../Classes/Topic.php';
    $conn = new Connector();
    $cn = $conn->getConn();
    $res = $cn->query('select * from topic');
    if($res->fetch()){
        $i = $res->rowCount();
        $i++;
    }else{
        $i = 1;
    }
    $tpc = $_POST["topic"];
    $topic = new Topic();
    $idT = "topic00$i";
    $topic->setCode_topic($idT);
    $topic->setTopic($tpc);
    $topic->setLogin("hammatestapp@gmail.com");
    $date = date("y-m-d");
    $topic->setDate($date);
    $topic->ajouter_topic();
    echo "sujet ajouter";
    

