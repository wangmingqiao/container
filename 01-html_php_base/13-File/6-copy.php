<?php
/**
 * @Author: WMQ
 * @Date:   2017-08-08 22:04:22
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-08-08 22:26:09
 */
//创建
function recurse_copy($olddir,$nowdir){
    //打开原文件
    $dir = opendir($olddir);
    //创建新文件
    mkdir($nowdir);
    //遍历当前文件夹
    while(false !==($file = readdir($dir))) {
        //除去.  ..文件夹
        if(($file != '.') && ( $file !='..')) {
            // 如果是文件夹 创建文件夹
            if( is_dir($olddir.'/'.$file) ) {
                recurse_copy($olddir.'/'.$file,$nowdir.'/'.$file);
            }else {
                // 是文件  则创建文件
                copy($olddir.'/'.$file,$nowdir.'/'.$file);
            }
        }
    }
    // 关闭文件夹资源
    closedir($dir);
}
recurse_copy('./a','./00');
