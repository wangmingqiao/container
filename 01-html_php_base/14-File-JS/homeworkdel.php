<?php
/**
 * @Author: WMQ
 * @Date:   2017-08-09 09:16:39
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-08-09 09:37:41
 */
//文件夹的删除
//文件夹的复制

//1.遍历文件夹
//2.删除文件
//3.删除文件夹(文件夹为空才能删)

function del_dir($path){
    //1.文件夹是否存在
    if (file_exists($path)) {
        //打开文件夹
        $dir=opendir($path);
        //遍历
        while ($file_name=readdir($dir)) {
            //过滤.和..
            if ($file_name=='.'||$file_name=='..') {
                continue;
            }
            //拼接完整的相对地址
            $file_path=$path.DIRECTORY_SEPARATOR.$file_name;
            if (is_file($file_path)) {
                unlink($file_path);
            }else{
                //删除文件夹
                del_dir($file_path);
            }
        }
        //关闭文件夹
        closedir($dir);
        //文件夹内的东西清空完毕-删除文件夹
        rmdir($path);
    }
}
del_dir('./0-html');