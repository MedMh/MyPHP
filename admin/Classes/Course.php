<?php
require_once 'Connector.php';
class Course {
    var $id;
    var $path;
    var $level;
    var $des;
    function __construct() {
        
    }
    function getId() {
        return $this->id;
    }

    function getPath() {
        return $this->path;
    }

    function getLevel() {
        return $this->level;
    }
    
    function getDes() {
        return $this->des;
    }
    

    function setId($id) {
        $this->id = $id;
    }

    function setPath($path) {
        $this->path = $path;
    }

    function setLevel($level) {
        $this->level = $level;
    }
    
    function setDes($des) {
        $this->des = $des;
    }

    function addCourse(){
        $conn = new Connector();
        $c = $conn->getConn();
        $pre = $c->prepare('insert into cours values(:id,:path,:level,:desc)');
        $pre->execute(array('id'=> $this->id, 'path'=> $this->path, 'level'=> $this->level, 'desc'=> $this->des));
    }
    function findAll(){
        $conn = new Connector();
        $c = $conn->getConn();
        $res = $c->query('select * from cours');
        return $res;
    }
    
    function findBeginner(){
        $conn = new Connector();
        $c = $conn->getConn();
        $res = $c->execute("select * from cours where level_c='B'");
        return $res;
    }
    
    function findMedium(){
        $conn = new Connector();
        $c = $conn->getConn();
        $res = $c->execute("select * from cours where level_c='M'");
        return $res;
    }
    function findAdvanced(){
        $conn = new Connector();
        $c = $conn->getConn();
        $res = $c->execute("select * from cours where level_c='A'");
        return $res;
    }
    
    function updateQuest($codec,$attr,$newValue){
        $conn = new Connector();
        $cn = $conn->getConn();
        $cn->execute('update cours set '.$attr.'='.$newValue.' where code_quest='.$codec);
    }
    
    function delCours($codec) {
        $conn = new Connector();
        $cn = $conn->getConn();
        $cn->execute('delete from cours where code_cours='.$codec);
    }

    
}
