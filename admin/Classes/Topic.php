<?php

/**
 * Description of Topic
 *
 * @author hamma
 */
require_once 'Connector.php';
class Topic {
    var $code_topic;
    var $topic;
    var $login;
    var $date;
    function __construct() {
        
    }
    function getCode_topic() {
        return $this->code_topic;
    }

    function getTopic() {
        return $this->topic;
    }

    function getLogin() {
        return $this->login;
    }
    function getDate() {
        return $this->date;
    }

    function setCode_topic($code_topic) {
        $this->code_topic = $code_topic;
    }

    function setTopic($topic) {
        $this->topic = $topic;
    }

    function setLogin($login) {
        $this->login = $login;
    }
    function setDate($date) {
        $this->date = $date;
    }
    
    function ajouter_topic() {
        $conn = new Connector();
        $cn = $conn->getConn();
        $pre = $cn->prepare('insert into topic values(:codet,:topic,:login,:datep)');
        $pre->execute(array('codet'=> $this->code_topic,
                            'topic'=> $this->topic,
                            'login'=> $this->login,
                            'datep'=> $this->date));
    }
    
    function getAllTopics() {
        $conn = new Connector();
        $cn = $conn->getConn();
        $res = $cn->query('select * from topic');
        return $res;
    }
    
    function getAllTopicsOfSo($login) {
        $conn = new Connector();
        $cn = $conn->getConn();
        $res = $cn->query('select * from topic where login='.$login);
        return $res;
    }
    
    function getAllTopicsExSo($login){
        $conn = new Connector();
        $cn = $conn->getConn();
        $res = $cn->query('select * from topic where login <>'.$login);
        return $res;
    }


}
