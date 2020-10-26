<?php
class Validation
{
    protected $data;
    private $validate_data =[];
    protected $errors = [];
    public static $fields =['name','email','username','password'];
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
       $this->validateUsername();
       $this->validatePassword();
       return $this->errors;
    }

    private function validateUsername(){
        $val = htmlspecialchars(trim($this->data['username']));
        if(empty($val)){
            $this->addError('username',"Username can't be empty");
        }else{
            if(!preg_match('/^[a-zA-Z0-9]{3,}$/', $this->data['username'])){
                $this->addError('username','username must be 3-12 chars and alpabatic');
            }if($this->user->checkUsername($val)){
                $this->addError('username',"Username already taken");
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
        }elseif($this->user->checkEmail($val)){
            $this->addError('email',"Email  already taken");
        }
        
        $this->validate_data['email'] =$val;
    }
    private function validatePassword(){
        $val = htmlspecialchars(trim($this->data['password']));
        if(empty($val)){
            $this->addError('password',"Password can't be empty");
         }elseif(strlen($val) < 6){
            $this->addError("password","Password is so short. minimum 6");
        }
        $this->validate_data['password'] =md5($val);
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
