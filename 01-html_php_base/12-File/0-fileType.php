<?php
/**
 * @Author: WMQ
 * @Date:   2017-08-07 10:49:37
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-08-07 21:42:29
 */
/*
 PHP文件系统处理
 文件系统基于linux

 文件处理的作用：
 1.项目中都有文件处理
 2.长时间的储存数据
 3.建立临时缓存

 文件类型：(在linux下所有的一切东西都是以文件的形式存在的)
 block：块，设置文件，磁盘分区，软驱，cd-rom 等
 char：字符设备，键盘，打印机
 dir：目录
 fifo：命名通道，用于进程间
 file：文件
 link：软连接
 unknown：未知，无法识别
 window下识别file dir unknown
 linux下全部识别,(基于linux)

 文件的属性
文件是否存在
file_exists(filename);
文件的大小
filesize(filename);
is_writable(filename);
is_readable(filename);

fileatime(filename);访问
filemtime(filename);修改
filectime(filename);创建

stat(filename);获得文件属性的数组
 */
//获取文件的属性
$filename='fileDemo.txt';
$fileArr=stat($filename);
var_dump($fileArr);
// 文件的类型获取
echo '<br>'. filetype($filename);
echo '<br>'. filetype('fileDir');
// 文件的判断
// is_file(filename)
// is_dir(filename)
// is_link(filename)
// is_executable(filename)判断是否可执行
// is_uploaded_file(path)是否是上传文件

// 可写可读
// is_readable();
// is_writable();
// 大小
// filesize();
// 时间
// fileatime 取得文件的上次访问时间
// filectime 取得文件的 inode 修改时间
// filemtime 取得文件修改时间
//封装一个方法：获取文件的属性：文件的大小(正常的形式)，文件的各种时间(正常显示)，文件还是文件夹，是否可读写
function getFileInfo($filename){
    if (!file_exists($filename)) {
        return'文件不存在';
    }
    if (is_dir($filename)) {
        return '文件夹';
    }
    if(is_file($filename)){
        $info=null;
        if(is_readable($filename)){
            $info['isread']=true;
        }else{
            $info['isread']=false;
        }
        if(is_writeable($filename)){
            $info['iswrite']=true;
        }else{
            $info['iswrite']=false;
        }
        $formart='Y/m/d H:i:s';
        // 取得文件的 inode 修改时间
        $info['ctime']=date($formart,filectime($filename));
        //取得文件修改时间
        $info['mtime']=date($formart,filemtime($filename));
        //取得文件的上次访问时间
        $info['atime']=date($formart,fileatime($filename));

        $info['size']=getFileSize(filesize($filename));
        return $info;
    }
    return '未知类型';
}
function getFileSize($size){
    $dw='Bytes';
    if ($size>=pow(2,40)) {//tb
        $size=round($size/pow(2,40),2);
        $dw='TB';
    }elseif($size>=pow(2,30)){//gb
        $size=round($size/pow(2,30),2);
        $dw='GB';
    }elseif($size>=pow(2,20)){//mb
        $size=round($size/pow(2,20),2);
        $dw='MB';
    }elseif($size>=pow(2,10)){//kb
        $size=round($size/pow(2,10),2);
        $dw='KB';
    }else{
        $size=$size;
    }
    return $size.$dw;
}
var_dump(getFileInfo('fileDemo.txt'));