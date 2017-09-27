<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/24
 * Time: 16:57
 */

include_once "/DB.php";
include_once 'common.php';


//登录逻辑
if (isset($_POST['email'])) {

    $email = $_POST['email'];
    $pwd = $_POST['password'];
    //判断空
    if (strlen($email)>0&&strlen($pwd)>0) {
        $sql = "SELECT * FROM user_info WHERE user_email='{$email}' AND user_pw='{$pwd}'";

        $res = db_query($sql);

        if ($res) {
            if (isset($_POST['autologin'])) {
                //设置cookie
                $timestamp = time();
                $str = $email.$pwd.$timestamp;
                $cookie_str = md5($str);
                setcookie('code',$cookie_str,time()+3600*24*7);
                setcookie('user_id',$res[0]['user_id'],time()+3600*24*7);
                //一般时间戳放数据库
                setcookie('timestamp',$timestamp,time()+3600*24*7);
            }

            //将用户名和用户id保存到session中
            session_start();
            $_SESSION['user_id']= $res[0]['user_id'];
            $_SESSION['user_name']=$res[0]['user_name'];
            $_SESSION['role_id']=$res[0]['role_id'];

            jump('登录成功,正在跳转...','/action.php?act=home');
        }else{
            echo "<script>alert('密码或邮箱不正确!')</script>";
        }


    }else {
        echo "<script>alert('密码和邮箱不能为空!')</script>";
    }

}else{

    if (isset($_COOKIE['code'])) {
        //如果有cookie,判断cookie的code是否正确,并自动登录
        $cookie_code = $_COOKIE['code'];
        $timestamp = $_COOKIE['timestamp'];
        $user_id = $_COOKIE['user_id'];

        $sql = "SELECT user_email,user_pw,user_id,user_name,role_id FROM user_info WHERE user_id={$user_id}";
        $res = db_query($sql);
        if ($res) {
            $email = $res[0]['user_email'];
            $pwd = $res[0]['user_pw'];

            $sql_str = $email.$pwd.$timestamp;
            if ($cookie_code == md5($sql_str)) {

                session_start();
                $_SESSION['user_id']= $res[0]['user_id'];
                $_SESSION['user_name']=$res[0]['user_name'];
                $_SESSION['role_id']=$res[0]['role_id'];

                jump('自动登录成功,正在跳转...','/action.php?act=home');
            }
        }

    }else{

        include_once __DIR__.DIRECTORY_SEPARATOR.'template'.DIRECTORY_SEPARATOR.'Login.php';
    }
}

