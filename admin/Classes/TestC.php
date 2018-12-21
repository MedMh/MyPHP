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

    
    function addQuestion() {
        $conn = new Connector();
        $cn = $conn->getConn();
        $cn->prepare('insert into test_c values (:codet,:log)');
        $cn->execute(array('codeq'=> $this->codeTest,
                            'log'=> $this->login
                            ));
    }
    
    function updateTest($codetest,$attr,$newValue){
        $conn = new Connector();
        $cn = $conn->getConn();
        $pre = $cn->prepare('update test_c set :attr=:var where code_quest=:code');
        $pre->execute(array('attr'=>$attr,
                            'var'=>$newValue,
                            'code'=>$codetest));
        
    }
    
    function delTest($codetest) {
        $conn = new Connector();
        $cn = $conn->getConn();
        $cn->execute('delete from test_c where code_quest='.$codetest);
    }
    
    
}
