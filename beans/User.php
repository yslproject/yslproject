<?php
class User
{
    public $username;
    public $password;
    public $tel;
    public $sex;
    public $birthday;
    public $email;

    function __construct($username, $password, $tel, $sex, $birthday, $email)
    {
        $this->username = $username;
        $this->password = $password;
        $this->tel = $tel;
        $this->sex = $sex;
        $this->birthday = $birthday;
        $this->email = $email;
    }
}