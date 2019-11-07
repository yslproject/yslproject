<?php
require_once ('../model/DB.php');
class ShopCarService
{
    public $db;
    function __construct()
    {
        $this->db = new DB();
    }

    // 查找
    function selectShop($userID) {
        $sql = "select * from shopcart where userID='{$userID}'";
        $res = $this->db->query($sql);
        if($res) {
            echo json_encode($res);
        } else {
            echo '{"code":"0"}';
        }
    }

    // 添加
    function insertShop($shopCar) {
        $sql = "insert into shopcart (userID, goodID, color, count, price) values ('{$shopCar->userID}', '{$shopCar->goodID}', '{$shopCar->color}', '{$shopCar->count}', '{$shopCar->price}')";
        $res = $this->db->query($sql);
        if($res) {
            echo '{"code":"1"}';
        } else {
            echo '{"code":"0"}';
        }
    }

    // 删除
    function deleteShop($id, $userID) {
        $sql = "delete from shopcart where ID='{$id}' and userID='{$userID}'";
        $res = $this->db->query($sql);
        if($res) {
            echo '{"code":"1"}';
        } else {
            echo '{"code":"0"}';
        }
    }
}