<?php
class Addr
{
    public $userID;
    public $name;
    public $tel;
    public $region;
    public $address;
    public $status;

    function __construct($userID, $name, $tel, $region, $address, $status)
    {
        $this->userID = $userID;
        $this->name = $name;
        $this->tel = $tel;
        $this->region = $region;
        $this->address = $address;
        $this->status = $status;
    }
}