<?php
require_once("Database.php");
require_once("Session.php");
class User{
    public $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    public function signup($data){
        $insert = $this->db->insertForSignUp($data['name'],$data['email'],$data['username'],$data['password']);
        if(!$insert){
            return false;
        }
        return true;
    }
    public function checkUsername($username): bool{
        $stmt =$this->db->pdo->prepare("SELECT username FROM tbl_users WHERE username =?");
        $stmt->bindParam(1,$username);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            return true;
        }
        return false;
    }
    public function checkEmail($email){
        $stmt =$this->db->pdo->prepare("SELECT email FROM tbl_users WHERE email =?");
        $stmt->bindParam(1,$email);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            return true;
        }
        return false;
    }
}
