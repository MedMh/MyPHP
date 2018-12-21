<?php
/**
 * Description of admin
 * 
 *
 * @author hamma
 */
require_once 'Connector.php';
class admin {
    var $login;
    var $password;
    function getLogin() {
        return $this->login;
    }

    function getPassword() {
        return $this->password;
    }
    function setLogin($login) {
        $this->login = $login;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function connect($login, $password){
        $cn = new Connector();
        $c = $cn->getConn();
        $res = $c->query("select * from admin where login='$login' and password='$password'");
        if($res->fetch()){
            return true;
        }else{
            return false;
        }
    }

}
