<?php
class ValidationLogin
{
    protected $data;
    private $validate_data =[];
    protected $errors = [];
    public static $fields =['email','password'];
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
       $this->validateEmail();
       $this->validatePassword();
       return $this->errors;
    }

 
    
    private function validateEmail(){
        $val = htmlspecialchars(trim($this->data['email']));
        if(empty($val)){
            $this->addError('email',"Email can't be empty");
        }elseif(!filter_var($this->data['email'], FILTER_VALIDATE_EMAIL)){
            $this->addError('email',"Email not valided");
        }elseif($this->user->checkEmail($val) == false){
            $this->addError('email',"Email  doesn't exists taken");
        }
        
        $this->validate_data['email'] =$val;
    }
    private function validatePassword(){
        $val = htmlspecialchars(trim($this->data['password']));
        if(empty($val)){
            $this->addError('password',"Password can't be empty");
         }elseif(strlen($val) < 6){
            $this->addError("password","Password is so short. minimum 6");
        }elseif(($this->user->checkPassword($this->data['email'],md5($val))) == false){
            $this->addError("password","Password is not correct");
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
