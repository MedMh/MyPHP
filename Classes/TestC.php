<?php

/**
 * Description of TestC
 *
 * @author hamma
 */
require_once 'Connector.php';
class TestC {
    var $codeTest;
    var $login;
    function __construct() {
        
    }
    function getCodeTest() {
        return $this->codeTest;
    }

    function getLogin() {
        return $this->login;
    }

    function setCodeTest($codeTest) {
        $this->codeTest = $codeTest;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    
    function addTest() {
        $conn = new Connector();
        $cn = $conn->getConn();
        $pre = $cn->prepare('insert into test_c (code_test,login) values (:codet,:log)');
        $pre->execute(array('codet'=> $this->codeTest,
                            'log'=> $this->login
                            ));
    }
    
    function updateTest($codetest,$attr,$newValue){
        $conn = new Connector();
        $cn = $conn->getConn();
        $cn->execute('update test_c set '.$attr.'='.$newValue.' where code_quest='.$codetest);
    }
    
    function delTest($codetest) {
        $conn = new Connector();
        $cn = $conn->getConn();
        $cn->execute('delete from test_c where code_quest='.$codetest);
    }
    
    
}
