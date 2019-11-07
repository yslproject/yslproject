<?php
require_once ('../model/DB.php');

class EvaluateService
{
    public $db;
    function __construct()
    {
        $this->db = new DB();
    }
    // 查找
    function selectEvaluate($userID) {
        $sql = "select * from evaluate where userID='{$userID}'";
        $res = $this->db->query($sql);
        if($res) {
            // 查找成功，打包数据返回前端
            echo json_encode($res);
        } else {
            // 查找失败
            echo '{"code":"0"}';
        }
    }
    // 增添
    function insertEvaluate($evaluate) {
        $sql = "insert into evaluate (userID, goodID, content, date) values ('{$evaluate->userID}', '{$evaluate->goodID}', '{$evaluate->content}', '{$evaluate->date}')";
        $res = $this->db->query($sql);
        if($res) {
            // 添加成功
            echo '{"code":"1"}';
        } else {
            // 添加失败
            echo '{"code":"0"}';
        }
    }

}