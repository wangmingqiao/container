<?php
/**
 * @Author: anchen
 * @Date:   2017-07-28 21:30:18
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-08-28 09:57:33
 */
include 'addhead.html';
$action = isset($_GET['action'])?$_GET['action']:'list';
$addtime = date("Y-m-d H/i/s");
$ip = $_SERVER['REMOTE_ADDR'];
$author = isset($_POST['author'])?$_POST['author']:'';
$title = isset($_POST['title'])?$_POST['title']:'';
$content = isset($_POST['content'])?$_POST['content']:'';
$feel = isset($_POST['feel'])?$_POST['feel']:'';
$filename = 'msg.txt';
$filecon = file_get_contents($filename);
if(!unserialize($filecon))
{
    $array = array();
}
else{
    $array = unserialize($filecon);
}

switch($action){
    case 'list':
        include 'admin.html';
        break;
    case 'add':
        include 'add.html';
        break;
    case 'addche':
        if($author!=''){
            $arr = array(
            'author'=>$author,
            'title'=>$title,
            'content'=>$content,
            'feel'=>$feel,
            'ip'=>$ip,
            'addtime'=>$addtime
            );
        $array[] = $arr;
        file_put_contents($filename,serialize($array));
        echo "<script>alert('插入成功');location.href='index.php?action=list'</script>";
        }
        else{
            echo "<script>alert('内容不能为空');location.href='index.php?action=add'</script>";
        }
        break;
    case 'update':
        $num = $_GET['num'];
        include 'update.html';
        break;
    case 'updateche':
        $num = $_GET['num'];
        if($author!=''){
            $array[$num] = array(
                'author'=>$author,
                'title'=>$title,
                'content'=>$content,
                'feel'=>$feel,
                'ip'=>$ip,
                'addtime'=>$addtime
            );
        file_put_contents($filename,serialize($array));
        echo "<script>alert('修改成功');location.href='index.php?action=list'</script>";
        }
        else{
            echo "<script>alert('内容不能为空');location.href='index.php?action=add'</script>";
        }
        break;
    case 'delete':
        $num = $_GET['num'];
        unset($array[$num]);
        echo "<script>alert('删除成功');location.href='index.php?action=list'</script>";
        file_put_contents($filename,serialize($array));
        break;
    default:
        break;
}
include 'addfoot.html';