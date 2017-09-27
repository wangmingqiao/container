<?php
/**
 * @Author: WMQ
 * @Date:   2017-07-17 09:41:09
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-07-17 10:57:04
 */

//数据库
//增删改查
//增
//insert into 表名(字段1，字段2) values(值1,值2)
//insert into 表名 values (值1，值2)
//查
//select * from 表名
//select 列名 from 表名 where 条件
//改
//update 表名 set 字段=新值 where 条件
//删除
//delete from 表名 where 条件




// 默认端口3306
//1.建立数据库连接
$connect=mysqli_connect('localhost', 'root', '123456', 'test');

if (!$connect) {
    echo "数据库连接失败".mysqli_error($connect);
}

//sql语句
//第二个括号内字段的位置，应该跟第一个括号内字段的位置和数量保持一致
// $sql="INSERT INTO student (id,name,age,tel,address)VALUES(null,'小李1','23','18838020156','河南省郑州市经开区')";

// $sql="INSERT INTO student (age,name)VALUES('23','小李2')";

//注意：括号内的字段顺序必须和表中个字段顺序一致
$sql="INSERT INTO student VALUES (null,'小李','23','12345678923','智游教育')";

//执行单条sql语句
$res=mysqli_query($connect,$sql);
if ($res) {
    echo "插入成功";
}else {
    echo "插入失败";
}
mysqli_close($connect);

// mysqli_query(link, query);
//执行多条sql语句
// mysqli_multi_query(link, query);