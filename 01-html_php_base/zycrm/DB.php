<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/28
 * Time: 10:56
 */

// 数据库配置信息
$dbconfig = [
    'host' => 'localhost',
    'user' => 'root',
    'pass' => '123456',
    'dbname' => 'crm_db1'
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