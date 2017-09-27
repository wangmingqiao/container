<?php
/**
 * @Author: WMQ
 * @Date:   2017-08-29 22:05:54
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-08-30 19:41:02
 */
//数据库配置信息
$dbconfig = [
    'host' => 'localhost',
    'user' => 'root',
    'pass' => '123456',
    'dbname' => 'zycrm'
];
$dsn = sprintf("mysql:dbname=%s;host=%s", $dbconfig['dbname'], $dbconfig['host']);
try {
    $dbh = new PDO($dsn, $dbconfig['user'], $dbconfig['pass'], array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8';"));
    //设置错误等级
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "数据库链接失败".$e->getMessage();
    exit();
}


//查询
function db_query($sql){
    global $dbh;
    try{
        $res = $dbh->query($sql);
        return $res->fetchall(PDO::FETCH_ASSOC);
    }catch (PDOException $e){
        echo "数据库错误".$e->getMessage();
    }
}


//执行
function db_exec($sql){
    global $dbh;
    try{
        $res = $dbh->exec($sql);
        if ($res === 1) {
            return true;
        } else {
            return false;
        }
    }catch (PDOException $e){
        echo "数据库错误".$e->getMessage();
    }
}