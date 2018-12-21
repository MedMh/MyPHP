<?php
/**
 * Description of User
 *
 * @author hamma
 */
require_once 'Connector.php';
class User {
    var $username;
    var $login;
    var $password;
    function __construct() {
        
    }
    function getUsername() {
        return $this->username;
    }

    function getLogin() {
        return $this->login;
    }

    function getPassword() {
        return $this->password;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setPassword($password) {
        $this->password = $password;
    }
    function signUp(){
        $cn = new Connector();
        $c = $cn->getConn();
        $pre = $c->prepare('insert into user (login,user_name,password) values(:log,:un,:pwd)');
        $pre->execute(array('log'=>$this->login,'un'=>$this->username,'pwd'=>$this->password));
    }
    
    static function login($login, $password){
        $cn = new Connector();
        $c = $cn->getConn();
        $res = $c->query("select * from user where login='$login' and password='$password'");
        if($res->fetch()){
            return true;
        }else{
            return false;
        }
    }
    
    function findAll(){
        $cn = new Connector();
        $c = $cn->getConn();
        $res = $c->query("select * from user");
        return $res;
    }
    
    function findBeginner(){
        $cn = new Connector();
        $c = $cn->getConn();
        $res = $c->query("select * from user where level_cl='B'");
        return $res;
    }
    function findMedium(){
        $cn = new Connector();
        $c = $cn->getConn();
        $res = $c->query("select * from user where level_cl='M'");
        return $res;
    }
    function findAdvanced(){
        $cn = new Connector();
        $c = $cn->getConn();
        $res = $c->query("select * from user where level_cl='A'");
        return $res;
    }
    
    function findCertified(){
        $cn = new Connector();
        $c = $cn->getConn();
        $res = $c->query("select * from user where level_cl='S'");
        return $res;
    }
    
    function updateUser($login,$attr,$newValue){
        $conn = new Connector();
        $cn = $conn->getConn();
        $cn->execute('update user set '.$attr.'='.$newValue.' where login='.$login);
    }
    
    function delUser($login) {
        $conn = new Connector();
        $cn = $conn->getConn();
        $cn->execute('delete from user where login='.$login);
    }
    function nextLevel($login, $next) {
        $conn = new Connector();
        $cn = $conn->getConn();
        $pre = $cn->prepare("update user set level_cl='$next' where login='$login'");
    }
}




















