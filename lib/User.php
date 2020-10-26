<?php
require_once("Database.php");
require_once("Session.php");
class User{
    public $db;

    public function __construct()
    {
        $this->db = new Database();
    }


}
