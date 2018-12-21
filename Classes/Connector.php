<?php
/**
 * this class allows you to connect to the database
 * the getConn Method return an object $conn that can be used to create queries,...
 * @author hamma
 */
class Connector {
    var $conn;
    function __construct() {
        try{
		$cn = new PDO('mysql:host=localhost;dbname=my_php_db;charset=utf8','med','azerty');
	}catch(Exception $e){
		die('Erreur: '.$e->getMessage());
	}
        $this->conn = $cn;
    }
    function getConn() {
        return $this->conn;
    }

}
