<?php
require_once("Database.php");
require_once("Session.php");
class User{
    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }


}
