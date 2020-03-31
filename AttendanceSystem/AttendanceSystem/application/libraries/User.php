<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User 
{
    public $fName;
    public $lName;
    public $Login_ID;
    public $Login_Email;
    public $User_Role;

    public function getfName()
    {
        return $this->fName;
    }

    public function getlName()
    {
        return $this->lName;
    }

    public function getLogin_ID()
    {
        return $this->Login_ID;
    }

    public function getLogin_Email()
    {
        return $this->Login_Email;
    }

    public function getUser_Role()
    {
        return $this->User_Role;
    }
}