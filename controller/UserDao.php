<?php
require_once ('../beans/User.php');
require_once ('../model/UserService.php');
// 判断类型
$type = $_POST['type'];
$service = new UserService();
if($type == 'login') {
    $name = $_POST['name'];
    $pwd = $_POST['pwd'];
    $service->login($name, $pwd);
} else if($type == 'register') {
    $name = $_POST['name'];
    $pwd = $_POST['pwd'];
    $tel = $_POST['tel'];
    $sex = $_POST['sex'];
    $birthday = $_POST['birthday'];
    $email = $_POST['email'];
    $user = new User($name, $pwd, $tel, $sex, $birthday, $email);
    $service->addUser($user);
}