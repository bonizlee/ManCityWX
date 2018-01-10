<?php

date_default_timezone_set("UTC");

class ConnectionMySQL {

    //主机
    private $host = "localhost";
    //数据库的username
    private $name = "mancity";
    //数据库的password
    private $pass = "lbz13926195432";
    //数据库名称
    private $dbname = "mancity";
    //编码形式
    private $ut = "utf-8";
    private $mysqlobj;

    //构造函数
    function __construct() {
        $this->connect();
    }

    //数据库的链接
    function connect() {
        $this->mysqlobj = new mysqli($this->host, $this->name, $this->pass);
        if (mysqli_connect_errno()) {
            exit();
        }
        $this->mysqlobj->select_db($this->dbname);
        $this->mysqlobj->query("SET NAMES '$this->ut'");
    }

    function query($sql) {
        if (!($query = $this->mysqlobj->query($sql))) {
            $this->show('Say:', $sql);
        }
        return $query;
    }

    function show($message = '', $sql = '') {
        if (!$sql) {
            echo $message;
        } else {
            echo $message . '<br>' . $sql;
        }
    }

    function affected_rows() {
        return $this->mysqlobj->affected_rows();
    }

    function result($query, $row) {
        return mysql_result($query, $row);
    }

    function num_rows($query) {
        return @mysql_num_rows($query);
    }

    function num_fields($query) {
        return mysql_num_fields($query);
    }

    function free_result($query) {
        return mysql_free_result($query);
    }

    function insert_id() {
        return mysql_insert_id();
    }

    function fetch_row($query) {
        return mysqli_fetch_row($query);
    }

    function fetch_array($query) {
        return mysqli_fetch_array($query);
    }

    function version() {
        return mysql_get_server_info();
    }

    function close() {
        return $this->mysqlobj->close();
    }

    function __destruct() {
        unset($this->mysqlobj);
    }

}
