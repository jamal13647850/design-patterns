<?php
/**
 * Created by PhpStorm.
 * User: Jamal
 * Date: 2/22/2019
 * Time: 12:25 AM
 */
class ConnectDB{
    private $conn;
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $db_name = "behrooz";

    public function __construct(){
        $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}",$this->user,$this->password);
    }

    public function getConnection(){
        return $this->conn;
    }
}


$instance1 = new ConnectDB();
var_dump($instance1->getConnection());


$instance2 = new ConnectDB();
var_dump($instance2->getConnection());



$instance3 = new ConnectDB();
var_dump($instance3->getConnection());



$instance4 = new ConnectDB();
var_dump($instance4->getConnection());



class Singleton{
    private static $instance = null;

    private $conn;
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $db_name = "behrooz";

    private function __construct(){
        $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}",$this->user,$this->password);
    }

    public function getConnection(){
        return $this->conn;
    }

    public static function getInstance(){
        if(self::$instance==null){
            self::$instance = new Singleton();
        }
        return self::$instance;
    }

}


$instance1 = Singleton::getInstance();
var_dump($instance1->getConnection());

$instance2 = Singleton::getInstance();
var_dump($instance2->getConnection());

$instance3 = Singleton::getInstance();
var_dump($instance3->getConnection());

$instance4 = Singleton::getInstance();
var_dump($instance4->getConnection());