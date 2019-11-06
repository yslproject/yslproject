<?php
require_once ('../beans/Goodlist.php');
require_once ('../model/GoodListService.php');

$type = $_POST['type'];
$service = new GoodListService();

switch($type) {
    // 查询
    case 'select':
        $typeX = $_POST['typeX'];
        $name = $_POST['name'];
        $service->selectGood( $typeX, $name);
        break;
    // 添加
    case 'insert':
        $type1 = $_POST['type1'];
        $type2 = $_POST['type2'];
        $type3 = $_POST['type3'];
        $enName = $_POST['enName'];
        $chName = $_POST['chName'];
        $color = $_POST['color'];
        $price = $_POST['price'];
        $intro = $_POST['intro'];
        $count = $_POST['count'];
        $img = $_POST['img'];
        $imgList = $_POST['imgList'];
        $countImg = $_POST['countImg'];
        $createTime = $_POST['createTime'];
        $good = new Good($type1, $type2, $type3, $enName, $chName, $color, $price, $intro, $count, $img, $imgList, $countImg, $createTime);
        $service->insertGood($good);
        break;
    // 修改
    case 'update':
        $upId = $_POST['upId'];
        $type1 = $_POST['type1'];
        $type2 = $_POST['type2'];
        $type3 = $_POST['type3'];
        $enName = $_POST['enName'];
        $chName = $_POST['chName'];
        $color = $_POST['color'];
        $price = $_POST['price'];
        $intro = $_POST['intro'];
        $count = $_POST['count'];
        $img = $_POST['img'];
        $imgList = $_POST['imgList'];
        $countImg = $_POST['countImg'];
        $createTime = $_POST['createTime'];

        $good = new Good($type1, $type2, $type3, $enName, $chName, $color, $price, $intro, $count, $img, $imgList, $countImg, $createTime);
        $service->updateGood($upId,$good);
        break;
    // 删除
    case 'delete':
        $id = $_POST['id'];
        $service->deleteGood($id);
        break;
}
