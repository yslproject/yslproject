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
        $colorType = $_POST['colorType'];
        $price = $_POST['price'];
        $intro = $_POST['intro'];
        $count = $_POST['count'];
        $img = $_POST['img'];
        $imgList = $_POST['imgList'];
        $countImg = $_POST['countImg'];
        $createTime = $_POST['createTime'];
        $good = new Good($type1, $type2, $type3, $enName, $chName, $colorType, $price, $intro, $count, $img, $imgList, $countImg);
        $service->insertGood($good);
        break;
    // 修改
    case 'update':

        $service->updateGood();
        break;
    // 删除
    case 'delete':
        $service->deleteGood();
        break;
}
