<?php
class Order
{
    public $userID;
    public $name;
    public $tel;
    public $address;
    public $goodName;
    public $color;
    public $price;
    public $count;
    public $img;
    public $timesTemp;
    public $status;

    function __construct($userID, $name, $tel, $address, $goodName,$color,$price,$count,$img,$timesTemp, $status)
    {
        $this->userID = $userID;
        $this->name = $name;
        $this->tel = $tel;
        $this->address = $address;
        $this->goodName = $goodName;
        $this->color = $color;
        $this->price = $price;
        $this->count = $count;
        $this->img = $img;
        $this->timesTemp = $timesTemp;
        $this->status = $status;
    }
}