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
        $sql = "insert into goodlist (type1, type2, type3, enName, chName, color, price, intro, count, img, imgList, countImg, createTime) values ('{$good->type1}', '{$good->type2}', '{$good->type3}', '{$good->enName}', '{$good->chName}','{$good->color}', '{$good->price}', '{$good->intro}','{$good->count}', '{$good->img}', '{$good->imgList}', '{$good->countImg}', '{$good->createTime}')";
        $res = $this->db->query($sql);
        if($res) {
            // 添加成功
            echo '{"code":"1"}';
        } else {
            // 添加失败
            echo '{"code":"0"}';
        }
    }
    // 修改
    function updateGood($upId, $good) {
        $sql = "update goodlist set type1='{$good->type1}', type2='{$good->type2}', type3='{$good->type3}', enName='{$good->enName}', chName='{$good->chName}', color='{$good->color}', price='{$good->price}', intro='{$good->intro}', count='{$good->count}', img='{$good->img}', imgList='{$good->imgList}', countImg='{$good->countImg}', createTime='{$good->createTime}' where ID='{$upId}'";
        $res = $this->db->query($sql);
        if($res) {
            // 修改成功
            echo '{"code":"1"}';
        } else {
            // 修改失败
            echo '{"code":"0"}';
        }
    }
    // 删除
    function deleteGood($id) {
        $sql = "delete from goodlist where ID='{$id}'";
        $res = $this->db->query($sql);
        if($res) {
            echo '{"code":"1"}';
        } else {
            echo '{"code":"0"}';
        }
    }
}



