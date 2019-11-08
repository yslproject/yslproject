<?php
class DB
{
    private $host = "localhost";
    private $username = "star";
    private $pwd = "123456";
    private $database = "ysl";

    public $mysqli;

    // 设置编码格式
    function __construct()
    {
        $this->connect();
        $this->mysqli->query("set names 'utf8'");
    }
    // 创建一个数据库链接并且判断是否链接成功
    function connect() {
        $this->mysqli = new mysqli($this->host, $this->username, $this->pwd, $this->database);
        if($this->mysqli->connect_error) {
            die('{"code": "0"}');
        }
    }

    function query($sql) {
        $result = $this->mysqli->query($sql);
        // 获取执行 sql 语句的结果的数据类型， 进行判断， 根据数据类型返回具体的值
        $datatype = gettype($result);
        if($datatype === 'object' ) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else if($datatype === 'boolean') {
            return $result;
        }
    }
}