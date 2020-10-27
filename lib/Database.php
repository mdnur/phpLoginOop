<?php

class Database
{
    private $hostdb = "127.0.0.1";
    private $dbname = "oop_phplogin";
    private $dbuser = "mdnur";
    private $dbpass ="password";
    public $pdo;

    public function __construct()
    {
        if(!isset($this->pdo)){
            try {
                $link =new PDO("mysql:host={$this->hostdb};dbname={$this->dbname}",$this->dbuser,$this->dbpass);
                $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $link->exec("SET CHARACTER SET utf8");
                $this->pdo = $link;
            } catch (PDOException $e) {
                echo("connection fail".$e->getMessage());
            }
        }
    }
    public function insertForSignUp($name,$email,$username,$password){
        $query = "INSERT INTO `tbl_users`(name, email, username ,password) VALUES (?,?,?,?)";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $email);
        $stmt->bindParam(3, $username);
        $stmt->bindParam(4, $password);
        if(!$stmt->execute()){
            return false;
        }

        return true;

    }
    public function getUserDataByEmailAndPassword($email,$password){
        $query = "SELECT id,name,email,username FROM `tbl_users` WHERE email=? and password=?";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(1,$email);
        $stmt->bindParam(2,$password);
        if(!$stmt->execute()){
            return false;
        }
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

}
