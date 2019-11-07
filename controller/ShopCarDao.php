<?php
require_once ('../beans/ShopCar.php');
require_once ('../model/ShopCarService.php');

$type = $_POST['type'];
$service = new ShopCarService();

switch($type) {
    case 'select':
        $userID = $_POST['userID'];
        $service->selectShop($userID);
        break;
    case 'insert':
        // 点击加入购物车， 将这件商品的信息加入购物车数据表中
        $userID = $_POST['userID'];
        $goodID = $_POST['goodID'];
        $color = $_POST['color'];
        $count = $_POST['count'];
        $price = $_POST['price'];
        $shopCar = new ShopCar($userID, $goodID, $color, $count, $price);
        $service->insertShop($shopCar);
        break;
    case 'delete':
        // 点击删除或者清空购物车，清除购物车中商品信息
        $userID = $_POST['userID'];
        $id = $_POST['id'];
        $service->deleteShop($id, $userID);
        break;
}