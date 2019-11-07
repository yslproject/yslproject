<?php
require_once ('../model/DB.php');
class AddressService
{
    public $db;
    function __construct()
    {
        $this->db = new DB();
    }
    // 增添
    function insertAddress($addr) {
        $sql = "insert into addresslist (userID, name, tel, region, address, status) values ('{$addr->userID}','{$addr->name}', '{$addr->tel}', '{$addr->region}', '{$addr->address}', '{$addr->status}')";
        $res = $this->db->query($sql);
        if($res) {
            echo '{"code":"1"}';
        } else {
            echo '{"code":"0"}';
        }
    }
    // 删除
    function deleteAddress($id, $userID) {
        $sql = "delete from addresslist where ID='{$id}' and userID='{$userID}'";
        $res = $this->db->query($sql);
        if($res) {
            echo '{"code":"1"}';
        } else {
            echo '{"code":"0"}';
        }
    }
    // 查找
    function selectAddress($userID) {
        $sql = "select * from addresslist where userID='{$userID}'";
        $res = $this->db->query($sql);
        if($res){
            echo json_encode($res);
        } else {
            echo '{"code":"0"}';
        }
    }
    // 修改
    function updateAddress($id, $addr) {
        $sql = "update addresslist set userID='{$addr->userID}', name='{$addr->name}', tel='{$addr->tel}', region='{$addr->region}', address='{$addr->address}', status='{$addr->status}' where ID='{$id}'";
        $res = $this->db->query($sql);
        if($res) {
            echo '{"code":"1"}';
        } else {
            echo '{"code":"0"}';
        }
    }
}
