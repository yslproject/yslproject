<?php
require_once('../model/DB.php');
class AdminService
{
    public $db;

    function __construct()
    {
        $this->db = new DB();
    }
    // 登录
    function adminLogin($name, $pwd) {
        $sql = "select password from adminlist where username='{$name}'";
        $res = $this->db->mysqli->query($sql);

        if($res->num_rows == 0) {
            // 用户未注册 无权访问
            echo '{"code": "0"}';
        } else if($res->num_rows > 0) {
            $obj = mysqli_fetch_assoc($res);
            $p = $obj['password'];
            if($pwd === $p) {
                echo '{"code":"2"}';
            } else {
                echo '{"code":"3"}';
            }
        } else {
            echo '{"code": "1"}';
        }
    }
}