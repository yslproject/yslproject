<?php
require_once ('../beans/Admin.php');
require_once ('../model/AdminService.php');

$type = $_POST['type'];
$service = new AdminService();

if($type == 'login') {
    $name = $_POST['name'];
    $pwd = $_POST['pwd'];
    $service->adminLogin($name, $pwd);
}