<?php
/**
 * @Author: WMQ
 * @Date:   2017-07-17 10:59:57
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-07-17 21:43:21
 */
$connect=mysqli_connect('localhost','root','123456','test');
if (!$connect) {
    echo"连接失败".mysqli_error($connect);
}

//update
$sql="DELETE FROM student WHERE name='小王'";

if (mysqli_query($connect,$sql)) {
    echo "删除成功";
}else{
    echo "删除失败";
}
mysqli_close($connect);
$sql="SELECT * FROM blog";
$res=mysqli_query($connect,$sql);
if (mysqli_num_rows($res>0)) {
    while (mysqli_fetch_assoc($res)) {
        var_dump($row);
    }
}
$sql="INSERT INTO blog values(值1,值2,值3,值4)";
$sql="INSERT INTO blog(id,name,age,tel,adress)VALUES(值1,值2,值3,值4,值5)";

$sql="DELETE from blog WHERE name='小李'";

$sql="UPDATE blog SET age='30' where name='小李'";

$sql="SELECT * FROM blog";
$res=mysqli_query($connect,$sql);
if (mysqli_num_rows($res>0)) {
    while (mysqli_fetch_assoc($res)) {
        var_dump($row);
    }
}

if (mysqli_query($connect,$sql)) {
    echo"插入成功";
}else{
    echo "插入失败";
}