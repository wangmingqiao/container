<?php
/**
 * @Author: WMQ
 * @Date:   2017-07-18 17:14:08
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-07-19 09:03:23
 */
 $connect=mysqli_connect('localhost','root','123456','test');
if (!$connect) {
    echo"连接失败".mysqli_error($connect);
}
//判断是处理登录请求还是注册请求
if (isset($_GET['action'])){
    $action=$_GET['action'];
    switch ($action) {
        case 'login':
        // 判断用户名和密码
        $user=$_POST['user'];
        $pwd=$_POST['pwd'];
        if ($user&&$pwd) {
            //跳转
            //include 相当于将2blogindex.php的全部内容放在了第19行这个位置
            //可以达到admin.php 和2blogindex.php文件链接的效果
            include '2blogindex.php';
        }
        // 跳转到后台首页
            break;
        case 'register':
            $user=$_POST["user"];
            $pwd=$_POST["pwd"];
            $sql="INSERT INTO zhuce (user,password) values('$user','$pwd')";
            if (mysqli_query($connect,$sql)) {
                echo "注册成功";
            }else {
                echo "注册失败";
            }
            mysqli_close($connect);
        default:

            break;
    }
}