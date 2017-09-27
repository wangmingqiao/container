<?php
/**
 * @Author: WMQ
 * @Date:   2017-08-08 14:43:06
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-08-09 19:57:13
 */
$dir_path='../../zhengke';
//接受参数并赋值0
if (isset($_GET['filepath'])) {
    $dir_path=$_GET['filepath'];
}
$dir=opendir($dir_path);
while ($file_name=readdir($dir)) {
    if ($file_name=='.') {
        continue;
    }
    //将文件名拼接成完整的相对路径
    $file_path=$dir_path.DIRECTORY_SEPARATOR.$file_name;
    if (is_dir($file_path)) {
        if ($file_name=='..') {
            $file_name='返回上一层';
            $mtime='';
            $file_type='';
            $file_size='';
        }else{
            //时间
            $mtime=filemtime($file_path);
            date_default_timezone_set('PRC');
            $mtime=date('Y/m/d H:i:s',$mtime);
            //类型
            $file_type=filetype($file_path);
            //大小
            $file_size=transform_file_size(dir_size($file_path));
            //自己定义方法计算
            //1.遍历文件夹
            //2.如果是文件累计计算大小(递归基础)
            //3.如果是文件夹--递归
        }
        //时间
        echo "<a href='4-file_list.php?filepath={$file_path}'>{$file_name}----------------时间{$mtime}
                      ------------------类型{$file_type}
                      ------------------大小{$file_size}</a><br>";
    }else{
        echo "{$file_name}<br>";
    }
}

function dir_size($dir_name){
    //文件大小统计变量
    $file_size=0;
    $dir=opendir($dir_name);
    while($file_name=readdir($dir)){
        //过滤.和..
        if ($file_name=='.'||$file_name=='..')
            continue;
            //判断文件 文件夹
            $file_path=$dir_name.DIRECTORY_SEPARATOR.$file_name;
            if (is_file($file_path)) {//文件
                $file_size+=filesize($file_path);
            }else{//文件夹
                //获得文件夹文件的大小
                $file_size+=dir_size($file_path);
            }
        }
        closedir($dir);
        return $file_size;
}
//第一层：获得文件夹内所有文件的大小

function transform_file_size($size){
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