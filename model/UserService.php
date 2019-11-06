<?php
require_once ('../model/DB.php');
class UserService
{
    public $db;
    function __construct()
    {
        $this->db = new DB();
    }
    // 注册
    function addUser($user) {
        // 添加用户进数据库
        $sql = "insert into userlist (username, password, sex, birthday, tel, email) values ('{$user->username}', '{$user->password}', '$user->sex', '{$user->birthday}', '{$user->tel}', '{$user->email}')";
        $res = $this->db->mysqli->query($sql);
        if($res) {
            // 加入成功
            echo '{"code":"1"}';
        } else {
            // 加入失败
            echo '{"code":"0"}';
        }
        var_dump($res);
    }
    // 登录
    function login($name, $pwd) {
        $sql = "select password from userlist where username='{$name}'";
        $res = $this->db->mysqli->query($sql);
        if($res->num_rows  == 0) {
            // 未注册
            echo '{"code":"0"}';
        } else if($res->num_rows > 0) {
            // 已注册
            $obj = mysqli_fetch_assoc($res);
            $p = $obj['password'];
            if($pwd === $p) {
                // 密码正确
                echo '{"code":"2"}';
            } else {
                // 密码错误
                echo '{"code":"3"}';
            }
        } else {
            // 未名错误
            echo '{"code":"1"}';
        }
    }
}