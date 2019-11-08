<?php
class Good
{
    public $type1;
    public $type2;
    public $type3;
    public $enName;
    public $chName;
    public $color;
    public $price;
    public $intro;
    public $count;
    public $img;
    public $imgList;
    public $countImg;
    public $createTime;

    function __construct($type1,$type2,$type3,$enName,$chName,$color,$price,$intro,$count,$img,$imgList,$countImg,$createTime)
    {
        $this->type1 = $type1;
        $this->type2 = $type2;
        $this->type3 = $type3;
        $this->enName = $enName;
        $this->chName = $chName;
        $this->color = $color;
        $this->price = $price;
        $this->intro = $intro;
        $this->count = $count;        
        $this->img = $img;
        $this->imgList = $imgList;
        $this->countImg = $countImg;
        $this->createTime = $createTime;
    }
}


