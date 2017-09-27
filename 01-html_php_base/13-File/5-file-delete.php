<?php
/**
 * @Author: WMQ
 * @Date:   2017-08-08 20:40:25
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-08-08 21:46:22
 */
function delete_dir($dir_name){
    // echo $dir_name;
    $dir=opendir($dir_name);
    // var_dump($dir)
    while ($file_name=readdir($dir) ){
        if ($file_name=='.'||$file_name=='..') {
            continue;
        }
        $file_path=$dir_name.DIRECTORY_SEPARATOR.$file_name;
        if (!is_dir($file_path)) {
            unlink($file_path);
        }else{
            delete_dir($file_path);

        }

    }
    closedir($dir);
    rmdir($dir_name);
}
$dir_name='../../1223/';
delete_dir($dir_name);