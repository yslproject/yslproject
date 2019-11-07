<?php
class ShopCar
{
    public $userID;
    public $goodID;
    public $color;
    public $count;
    public $price;

    function __construct($userID, $goodID, $color, $count, $price)
    {
        $this->userID = $userID;
        $this->goodID = $goodID;
        $this->color = $color;
        $this->count = $count;
        $this->price = $price;
    }
}