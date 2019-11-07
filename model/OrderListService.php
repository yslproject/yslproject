<?php
require_once ('../model/DB.php');
class OrderListService
{
    public $db;
    function __construct()
    {
        $this->db = new DB();
    }
    // 查找
    function selectOrder($userID) {
        $sql = "select * from orderlist where userID='{$userID}'";
        $res = $this->db->query($sql);
        if($res) {
            echo json_encode($res);
        } else {
            echo '{"code":"0"}';
        }
    }

    // 删除订单
    function deleteOrder($id, $status) {
        $sql = "delete from orderlist where ID='{$id}' and status='{$status}'";
        $res = $this->db->query($sql);
        if($res) {
            echo '{"code":"1"}';
        } else {
            echo '{"code":"0"}';
        }
    }

    // 添加订单
    function insertOrder($order){
        $sql = "insert into orderlist (userID, name, tel, address, goodName, color,price,count,img,timesTemp, status) values ('{$order->userID}', '{$order->name}', '{$order->tel}', '{$order->address}', '{$order->goodName}', '{$order->color}', '{$order->price}', '{$order->count}', '{$order->img}', '{$order->timesTemp}', '{$order->status}')";
        $res = $this->db->query($sql);
        if($res) {
            echo '{"code":"1"}';
        } else {
            echo '{"code":"0"}';
        }
    }
}