<?php
/**
 * @Author: WMQ
 * @Date:   2017-08-23 09:32:19
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-08-24 13:17:58
 */
// 对象
// 使用new关键字声明对象


// 类比：
// js中:
// .查找属性
// .调用对象的方法


// PHP中：
// ->查找属性
// ->调用对象的方法

// PDP的使用
// 配置信息

$host ='localhost';
$user='root';
$pwd='123456';
$db='php505';

try {
    // 数据库连接
    $pdo = new PDO("mysql:host=$host;dbname=$db",$user,$pwd);

    // 查询
    $sql="SELECT * FROM em";

    foreach ($pdo->query($sql) as $row) {
        print_r($row);
    }
    // 修改
    // $sql = "UPDATE em SET e_salary=8000 EHERE e_no=1004";

    // exec执行一条sql语句
    // query也是执行一条sql语句-查询使用
    // $rs=$pdo -> query($aql);
    // var_dump($rs);

    // 插入
    // $h='houqin';
    // $sql = "INSERT INTO dept VALUES (50,'$h','zhengzhou')";
    // $rs=$pdo -> query($sql);
    // var_dump($rs);

    // 删除
    // $sql = "delete from dept where d_no=50";
    // $rs=$pdo -> exec($sql);
    // var_dump($rs);

    // 关闭
    // $pdo = null;

} catch (Exception $e) {
    // Exception 异常
    echo $e->getMessage();
}