<?php
/**
 * @Author: WMQ
 * @Date:   2017-08-01 08:28:57
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-08-01 18:59:27
 */
include_once 'showadd.php';
//添加
//1，获得用户提交的数据，添加到数组
if (isset($_GET['action'])) {
    $action=$_GET['action'];
    if ($action=='add') {
        if ($_POST['user']&&$_POST['msg']) {
            //先组织每条留言的数据
            $msg=[$_POST['user'],$_POST['msg']];
            // 再组织留言列表的数据
            $msglist=readFileData();
             //再组织流列表的数据
            $msglist[]=$msg;
            // $filename=readFileData();
            // 将最新的数据写入本地
            $res=file_put_contents($filename, serialize($msglist));
            if ($res) {
               echo "写入成功 3秒后跳转首页！<br>";
               echo '<meta http-equiv="refresh" content="3;url=showmsg.php" />';
            }else{
                echo "写入失败！";
            }
        }
        else {
            echo "用户名和留言不能为空";
        }
    }
}
//2，将数组写入文件
//3，自动跳转首页
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />

    <title>添加留言</title>
</head>
<body>

    <form action="addmsg.php?action=add" method="post">
        用户：
        <input type="text" name="user" /><br/>
        留言：
        <textarea name="msg" id="" cols="30" rows="10"></textarea>
        <input type="submit" value="提交留言" />
    </form>
</body>
<html>