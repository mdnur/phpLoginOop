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

}
