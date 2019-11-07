<?php
require_once ('../beans/Orderlist.php');
require_once ('../model/OrderListService.php');

$type = $_POST['type'];
$service = new OrderListService();

switch($type) {
    case 'select':
        $userID = $_POST['userID'];
        $service->selectOrder($userID);
        break;
    case 'delete':
        $id = $_POST['id'];
        $status = $_POST['status'];
        $service->deleteOrder($id, $status);
        break;
    case 'insert':
        $userID = $_POST['userID'];
        $name = $_POST['name'];
        $tel = $_POST['tel'];
        $address = $_POST['address'];
        $goodName = $_POST['goodName'];
        $color = $_POST['color'];
        $price = $_POST['price'];
        $count = $_POST['count'];
        $img = $_POST['img'];
        $timesTemp = $_POST['timesTemp'];
        $status = $_POST['status'];
        $order = new Order($userID, $name, $tel, $address, $goodName,$color,$price,$count,$img,$timesTemp, $status);
        $service->insertOrder($order);
}