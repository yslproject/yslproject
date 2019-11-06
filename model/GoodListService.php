<?php
require_once ('../model/DB.php');
class GoodListService
{
    public $db;
    function __construct()
    {
        $this->db = new DB();
    }
    // 查找
    function selectGood($typeX,$name) {
        // 按类查询商品
        $sql = "select * from goodlist where type{$typeX} ='{$name}'";
        $res = $this->db->query($sql);
        if($res) {
            // 查询成功，打包相应数据返给前端s
            echo json_encode($res);
        } else {
            // 查询失败
            echo '{"code":"0"}';
        }
    }
    // 后台管理系统
    // 添加
    function insertGood($good) {
        $sql = "insert into goodlist (type1, type2, type3, enName, chName, color, price, intro, count, img)";
    }
    // 修改
    function updateGood() {

    }
    // 删除
    function deleteGood() {

    }
}



