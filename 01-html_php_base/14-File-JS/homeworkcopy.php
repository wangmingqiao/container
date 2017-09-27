<?php
/**
 * @Author: WMQ
 * @Date:   2017-08-09 09:39:37
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-08-09 13:03:22
 */
//s 源文件
//d 目标
function copy_dir($s_path,$d_path){
    //如果要copy的目录不存在直接返回
    if(file_exists($s_path)){
        return ;
    }
    //目标目录是或否存在-不存在-创建
    if (file_exists($d_path)) {
        mkdir($d_path);
    }
    $dir=opendir($s_path);
    while ($s_filename=readdir($dir)) {
        //过滤
        if ($s_filename='.'||$s_filename='..') {
            continue;
        }
        //拼接完整的相对路径
        $s_filepath=$s_path.DIRECTORY_SEPARATOR.$s_filename;
        $d_filepath=$d_path.DIRECTORY_SEPARATOR.$s_filename;
        if (is_file($s_filepath)) {
            copy($s_filepath,$d_filepath);
        }else{
            copy_dir($s_filepath,$d_filepath);
        }
    }
    closedir($dir);
}
copy_dir();