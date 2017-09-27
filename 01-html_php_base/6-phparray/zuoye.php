<?php
/**
 * @Author: WMQ
 * @Date:   2017-07-28 18:51:50
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-07-29 17:54:20
 */
include'liuyan0.html';
$action = isset($_GET['action'])?$_GET['action']:'list';
$title = isset($GET['title'])?$_GET['title']:'';
$content = isset($GET['content'])?$_GET['content']:'';
$author = isset($GET['author'])?$_GET['author']:'';
$datetime = date("Y-m-d H/i/s");
$ip=$_SERVER['REMOTE_ADDR'];
$tupian = isset($GET['tupian'])?$_GET['tupian']:'';
$filename='msg.txt';
$filecon=file_get_contents($filename);
if (!unserialize($filecon)) {
    $arr=array();
}else{
    unserialize($filecon);
}

if (isset($_GET['action'])) {
    $action=$_GET['action'];
    switch ($action) {
        case 'list':
            # code...
            break;
        case 'tijaio':
            include 'liuyan0.html';
            break;
        case 'update':
        $num=$_GET['num'];
        if ($author!='') {
            $array[$num]=array('title'=>$title,'content'=>$content,'author'=>$author,'datetime'=>$datetime,'ip'=>$ip,'tupian'=>$tupian);
            file_put_contents($filename,serialize($arr));
        echo "<script>alert('修改成功');location.href='zuoye.php?action=list'</script>";
        }else{
        echo "<script>alert('修改失败');location.href='zuoye.php?action=list'</script>";

        }

            break;
        case 'delete':
        break;
    }
}
?>