<?php
/**
 * @Author: WMQ
 * @Date:   2017-07-17 11:04:55
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-07-17 11:31:01
 */
$connect=mysqli_connect('localhost','root','123456','test');
if (!$connect) {
    echo"连接失败".mysqli_error($connect);
}

//select
//order by 排序
//DESC 降续
$sql="SELECT * FROM `student` ORDER BY age DESC";

$res=mysqli_query($connect,$sql);
if (mysqli_num_rows($res)>0) {
   while ($row=mysqli_fetch_assoc($res)) {
       var_dump($row);
   }
}
mysqli_close($connect);
//练习
//分析blog文章表需要哪些字段，并创建blog表
//练习，代码增删改查