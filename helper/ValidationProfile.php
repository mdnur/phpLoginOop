<?php
require_once($_SERVER['DOCUMENT_ROOT']."/lib/Session.php");

class ValidationProfile
{
    protected $data;
    private $validate_data =[];
    protected $errors = [];
    public static $fields =['name','email','username','bio'];
    private $user;


    public function __construct($data)
    {
        $this->user = new User();
        $this->data = $data;
    }

    public function validateForm()
    {
       foreach (self::$fields as $field ) {
         if(!array_key_exists($field,$this->data)){
             trigger_error("$field are not present in data ");
             return ;
         }
       }
       $this->validateName();
       $this->validateEmail();
       $this->validateBio();
       $this->validateUsername();
       return $this->errors;
    }

    private function validateUsername(){
        $val = htmlspecialchars(trim($this->data['username']));
        if(empty($val)){
            $this->addError('username',"Username can't be empty");
        }else{
            if(!preg_match('/^[a-zA-Z0-9]{3,}$/', $this->data['username'])){
                $this->addError('username','username must be 3-12 chars and alpabatic');
            }if($this->user->checkUsernameForUpdate(Session::get('username'),$val)){
                $this->addError('username',"{$val} Username already taken");
            }
        }
        $this->validate_data['username'] =$val;
      
    }
    private function validateName(){
        $val = htmlspecialchars(trim($this->data['name']));
        if(empty($val)){
            $this->addError('name',"Name can't be empty");
        }elseif(strlen($val) < 3){
            $this->addError("name","Name should be have at least 3 char");
        }elseif(!preg_match("/^[a-zA-Z]{3-20|$/",$this->data['name'])){
            $this->addError('name','Name must use  only alpabatic');
        }
        $this->validate_data['name'] =$val;
    }
    private function validateEmail(){
        $val = htmlspecialchars(trim($this->data['email']));
        if(empty($val)){
            $this->addError('email',"Email can't be empty");
        }elseif(!filter_var($this->data['email'], FILTER_VALIDATE_EMAIL)){
            $this->addError('email',"Email not valided");
        }elseif($this->user->checkEmailForUpdate(Session::get('email'),$val)){
            $this->addError('email',"{$val} Email  already taken");
        }
        
        $this->validate_data['email'] =$val;
    }

    public function validateBio()
    {
        $val = htmlspecialchars(trim($this->data['bio']));
        if (!empty($val)) {
            if(strlen($val) > 100){
                $this->addError('bio',"Not more then 100 char");
            }
        }
        $this->validate_data['bio'] =$val;

    }

    private function addError($key,$message){
        $this->errors[$key] = $message;
    }
    
    public function getData(){
        if($this->errors){
            return ;
        }
        return $this->validate_data;
    }

}
