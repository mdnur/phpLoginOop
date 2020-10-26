<?php
class validation
{
    protected $data;
    protected $errors = [];

    public function __construct($data)
    {
        $this->data = $data;
    }

    
    public static function validate($data)
    {
        return new validation($data);
    }

    public  function is_empty(){
        if(!isset($this->data['name'])){
            $this->errors['name'] = "Name is required";
        }elseif(!isset($this->data['email'])){
            $this->errors['email'] = "Email is required";
        }elseif(!isset($this->data['username'])){
            $this->errors['username'] = "username is required";
        }elseif(!isset($this->data['password'])){
            $this->errors['password'] = "Password is required";
        }

        if(count($this->errors) >0){
            return false;
        }
        return $this;
    }

    public function trim(){
        foreach (array_keys($_POST) as $key_name ) {
            $this->data[$key_name] = trim($this->data[$key_name]);
        }
        return $this;
    }

    public  function filter_data(){
        $this->data['name'] = filter_input(INPUT_POST, $this->data['name'], FILTER_SANITIZE_STRING);
        $this->data['email'] = filter_var( filter_input( INPUT_POST, $this->data['email'], FILTER_SANITIZE_EMAIL ), FILTER_VALIDATE_EMAIL );
        $this->data['username'] = filter_input(INPUT_POST, $this->data['username'], FILTER_SANITIZE_SPECIAL_CHARS);
        $this->data['password'] = filter_input(INPUT_POST, $this->data['password'], FILTER_SANITIZE_SPECIAL_CHARS);
        return $this;
    }

    public function getData(){
        return $this->data;
    }

}
