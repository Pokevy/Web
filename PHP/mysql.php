<?php
    //创建连接数据库类
    class Mysql{
        //声明私有属性
        private static $host = "127.0.0.1";
        private static $user = "root";
        private static $password = "root";
        private static $dbName = "_lp";
        private static $port = "3306";
        private static $charset = "utf8";
        public $conn = null;
        //构造方法-->实例对象时连接数据库
        function __construct(){
            $this->conn = new mysqli(self::$host, self::$user, self::$password, self::$dbName, self::$port);
            $this->conn->query("set names".self::$charset);
        }
        //执行SQL->返回结果数量集
        function sql($sql): int{
            $this->conn->query($sql);
            return $this->conn->affected_rows;
        }
        //关闭数据库
        function close(): void{ @mysqli_close($this->conn); }
    }
