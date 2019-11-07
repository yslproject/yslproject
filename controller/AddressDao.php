<?php
require_once ('../beans/Address.php');
require_once ('../model/AddressService.php');

$type = $_POST['type'];
$service = new AddressService();

switch($type) {
    case 'insert':
        $userID = $_POST['userID'];
        $name = $_POST['name'];
        $tel = $_POST['tel'];
        $region = $_POST['region'];
        $address = $_POST['address'];
        $status = $_POST['status'];
        $addr = new Addr($userID, $name, $tel, $region, $address, $status);
        $service->insertAddress($addr);
        break;
    case 'update':
        $id = $_POST['id'];
        $userID = $_POST['userID'];
        $name = $_POST['name'];
        $tel = $_POST['tel'];
        $region = $_POST['region'];
        $address = $_POST['address'];
        $status = $_POST['status'];
        $addr = new Addr($userID, $name, $tel, $region, $address, $status);
        $service->updateAddress($id, $addr);
        break;
    case 'select':
        $userID = $_POST['userID'];
        $service->selectAddress($userID);
        break;
    case 'delete':
        $id = $_POST['id'];
        $userID = $_POST['userID'];
        $service->deleteAddress($id, $userID);
        break;
}