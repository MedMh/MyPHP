<?php
/**
 * Description of Response
 *
 * @author hamma
 */
require_once 'Connector.php';
class Response {
    var $coderep;
    var $resp;
    var $codetopic;
    var $daterep;
    var $login;
    function __construct() {
        
    }
    function getCoderep() {
        return $this->coderep;
    }

    function getResp() {
        return $this->resp;
    }

    function getCodetopic() {
        return $this->codetopic;
    }

    function getDaterep() {
        return $this->daterep;
    }
    
    function getLogin() {
        return $this->login;
    }

    function setCoderep($coderep) {
        $this->coderep = $coderep;
    }

    function setResp($resp) {
        $this->resp = $resp;
    }

    function setCodetopic($codetopic) {
        $this->codetopic = $codetopic;
    }

    function setDaterep($daterep) {
        $this->daterep = $daterep;
    }
    
    function setLogin($login) {
        $this->login = $login;
    }
    
    function ajouter_topic() {
        $conn = new Connector();
        $cn = $conn->getConn();
        $pre = $cn->prepare('insert into response values(:codrep,:rep,:codet,:datep,:log)');
        $pre->execute(array('codrep'=> $this->coderep,
                            'rep'=> $this->resp,
                            'codet'=> $this->codetopic,
                            'datep'=> $this->daterep,
                            'log'=> $this->login));
    }
    
    function getAllRepOfTopic($topic) {
        $conn = new Connector();
        $cn = $conn->getConn();
        $res = $cn->query('select * from response where code_topic ='.$topic);
        return $res;
    }

    function getAllRep() {
        
    }

}
