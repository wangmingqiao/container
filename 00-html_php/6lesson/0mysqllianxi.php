<?php
/**
 * @Author: WMQ
 * @Date:   2017-07-17 11:19:27
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-07-17 15:33:10
 */
$connect=mysqli_connect('localhost','root','123456','test');
if (!$connect) {
    echo"连接失败".mysqli_error($connect);
}
//增
$sql="INSERT INTO blog1 (id,name,age,tel,address)VALUES(NULL,'小张','20','12345678911','北京'),(NULL,'小赵','20','18838020156','上海'),(NULL,'小刘','20','16325682645','广州'),(NULL,'小高','20','15986256658','郑州'),(NULL,'小王','20','17113546921','江苏');";

// if (mysqli_query($connect,$sql)) {
//     echo "增加成功";
// }else{
//     echo "增加失败";
// }

//删
$sql.="DELETE FROM blog1 WHERE name='小张';";
// if (mysqli_query($connect,$sql)) {
//     echo "删除成功";
// }else{
//     echo "删除失败";
// }

//改
$sql.="UPDATE blog1 SET age='22' WHERE name='小赵';" ;
// if (mysqli_query($connect,$sql)) {
//     echo "更改成功";
// }else{
//     echo "更改失败";
// }

//查
// $sql="SELECT * FROM `blog` ORDER BY age DESC;";

// $res=mysqli_query($connect,$sql);
// if (mysqli_num_rows($res)>0) {
//    while ($row=mysqli_fetch_assoc($res)) {
//        var_dump($row);
//    }
// }
if (mysqli_multi_query($connect,$sql)) {
    echo "成功";
}else{
    echo "失败";
}
mysqli_close($connect);