<?php

// DB 接続パラメータ
#$DNS = "mysql:dbname=webchat;host=localhost;charset=utf8";
$DNS = "mysql:dbname=webchat;host=127.0.0.1;charset=utf8";
$USER = "root";
$PW = "";

function get_connect() {
    global $DNS, $USER, $PW;
    return new PDO($DNS, $USER, $PW);
}

?>