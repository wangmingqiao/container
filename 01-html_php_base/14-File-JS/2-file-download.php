<?php
/**
 * @Author: WMQ
 * @Date:   2017-08-09 15:35:03
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-08-10 08:45:03
 */
//下载需要设置http的请求头信息
//目的是告诉浏览器，处理这个文件的方式
if (isset($_GET['fname'])){
    $file_name=$_GET['fname'];
    // $file_name='homeworkdel.php';
    //设置头信息
    //header()
    //image/png image/jpeg image/jpg image/gif
    header("Content-Type:text/html");//文件类型
    //处理方式 attachment附件的形式处理
    $fname=basename($file_name);
    header("Content-Disposition:attachment;filename={$file_name}");
    //文件的大小
    // header("Content-Length:".filesize($file_name));
    // 将文件内容输出
    readfile($file_name);
}



$dir_path='../14-File-JS';
$dir = opendir($dir_path);
while ($file_name=readdir($dir)) {
    if ($file_name=='.'||$file_name=='..') {
        continue;
    }
    $file_path=$dir_path.DIRECTORY_SEPARATOR.$file_name;
    echo "<p><a href='2-file-download.php?fname={$file_path}'>{$file_name}</a></p>";
}

?>


