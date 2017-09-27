<?php
/**
 * @Author: WMQ
 * @Date:   2017-07-17 14:44:11
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-07-17 15:21:22
 */

//设置时区
date_default_timezone_set("PRC");
//10条数据
$sql='';
for ($i=0; $i <10; $i++) {
    //分类
    $category_id=$i%2;
    //时间
    $date=date('Y-m-d H:i:s',time());
    $sql .="INSERT INTO blog VALUES (null,'title-$i','content-$i','author-$i','$date',$category_id);";
}

$connect=mysqli_connect('localhost','root','123456','test');
if (!$connect) {
    echo "error link sql";
}
//数据库多行插入
if(mysqli_multi_query($connect,$sql)){
    echo "插入成功";
}else {
    echo "插入失败";
}
mysqli_close($connect);