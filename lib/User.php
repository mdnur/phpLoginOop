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
    
    public function signIn($data){
        $user_data = $this->db->getUserDataByEmailAndPassword($data['email'],$data['password']);
        return $user_data;
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
    public function checkPassword($email,$password){
        $stmt =$this->db->pdo->prepare("SELECT email,password FROM tbl_users WHERE email =? and password =?");
        $stmt->bindParam(1,$email);
        $stmt->bindParam(2,$password);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            return true;
        }
        return false;
    }
    public function all(){
        $query ="SELECT id,name,email,username,bio FROM tbl_users";
        $stmt = $this->db->pdo->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function get($id){
        $query ="SELECT id,name,email,username,bio FROM tbl_users WHERE id=? ";
        $stmt = $this->db->pdo->prepare($query);
        $stmt->bindParam(1,$id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        return $result;
    }
    public function checkUsernameForUpdate($oldUserName,$newUserName)
    {
        $stmt =$this->db->pdo->prepare("SELECT username FROM tbl_users WHERE username =? or username=?");
        $stmt->bindParam(1,$oldUserName);
        $stmt->bindParam(2,$newUserName);
        $stmt->execute();
        if($stmt->rowCount() >= 2){
            return true;
        }
        return false;
    }
    public function checkEmailForUpdate($oldEmail,$newEmail){
        $stmt =$this->db->pdo->prepare("SELECT email FROM tbl_users WHERE email =? or email=?");
        $stmt->bindParam(1,$oldEmail);
        $stmt->bindParam(2,$newEmail);
        $stmt->execute();
        if($stmt->rowCount() >= 2){
            return true;
        }
        return false;
    }
    public function update($data,$id)
    {
        $query = "UPDATE tbl_users SET name=? , email=?,username=?,bio=? WHERE id=?";
        $stmt = $this->db->pdo->prepare($query);
        $stmt->bindParam(1,$data['name']);
        $stmt->bindParam(2,$data['email']);
        $stmt->bindParam(3,$data['username']);
        $stmt->bindParam(4,$data['bio']);
        $stmt->bindParam(5,$id);
        if (!$stmt->execute()) {
            return false;
        }
        return true;
    }
}
