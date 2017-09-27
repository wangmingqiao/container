<?php
/**
 * @Author: WMQ
 * @Date:   2017-07-17 10:47:18
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-07-17 10:54:51
 */
//链接
$connect=mysqli_connect('localhost','root','123456','test');
if (!$connect) {
    echo"连接失败".mysqli_error($connect);
}

//update
$sql="UPDATE student SET age='30' WHERE name='小李'";

if (mysqli_query($connect,$sql)) {
    echo "更新成功";
}else{
    echo "更新失败";
}
mysqli_close($connect);