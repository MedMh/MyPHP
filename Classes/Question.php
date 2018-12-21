<?php

/**
 * Description of Question
 *
 * @author hamma
 */
require_once 'Connector.php';
class Question {
    var $code_quest;
    var $enonce;
    var $repj;
    var $repa;
    var $repb;
    var $repc;
    var $codeTest;
    function __construct() {
        
    }
    function getCode_quest() {
        return $this->code_quest;
    }

    function getEnonce() {
        return $this->enonce;
    }

    function getRepj() {
        return $this->repj;
    }

    function getRepa() {
        return $this->repa;
    }

    function getRepb() {
        return $this->repb;
    }

    function getRepc() {
        return $this->repc;
    }

    function getCodeTest() {
        return $this->codeTest;
    }

    function setCode_quest($code_quest) {
        $this->code_quest = $code_quest;
    }

    function setEnonce($enonce) {
        $this->enonce = $enonce;
    }

    function setRepj($repj) {
        $this->repj = $repj;
    }

    function setRepa($repa) {
        $this->repa = $repa;
    }

    function setRepb($repb) {
        $this->repb = $repb;
    }

    function setRepc($repc) {
        $this->repc = $repc;
    }

    function setCodeTest($codeTest) {
        $this->codeTest = $codeTest;
    }
    
    function addQuestion() {
        $conn = new Connector();
        $cn = $conn->getConn();
        $cn->prepare('insert into question values (:codeq,:en,:rj,:ra,:rb,:rc,:ct)');
        $cn->execute(array('codeq'=> $this->code_quest,
                            'en'=> $this->enonce,
                             'rj'=> $this->repj,
                             'ra'=> $this->repa,
                             'rb'=> $this->repb,
                             'rc'=> $this->repc,
                             'ct'=> $this->codeTest
                            ));
    }
    
    function updateQuest($codeq,$attr,$newValue){
        $conn = new Connector();
        $cn = $conn->getConn();
        $cn->execute('update question set '.$attr.'='.$newValue.' where code_quest='.$codeq);
    }
    
    function delQuest($codeq) {
        $conn = new Connector();
        $cn = $conn->getConn();
        $cn->execute('delete from quest where code_quest='.$codeq);
    }
    
    function findQuest($codetest) {
        $conn = new Connector();
        $cn = $conn->getConn();
        $res = $cn->execute('select * from question where code_test='.$codetest);
        return $res;   
    }
    
    
}















