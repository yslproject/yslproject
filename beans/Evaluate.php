<?php
class Evaluate
{
    public $userID;
    public $goodID;
    public $content;
    public $date;

    function __construct($userID, $goodID, $content, $date)
    {
        $this->userID = $userID;
        $this->goodID = $goodID;
        $this->content = $content;
        $this->date = $date;
    }
}