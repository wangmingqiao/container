<?php
/**
 * @Author: WMQ
 * @Date:   2017-08-07 14:41:38
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-08-07 15:35:44
 */
//文件的操作
//PHP提供的函数
//增加：touch();
//删除：unlink();
//移动：rename();
//复制：copy();
// $file='./bb.txt';
// $new_file='./fileDir/bb.txt';
// $file='D:\wampstack-5.6.19-0\apache2\htdocs\zhengke\12-File\fileDir\c.txt';
// $rs=touch($file);
// if ($rs) {
//     echo '文件创建成功';
// }else{
//     echo '文件创建失败';
// }

//删除文件
// unlink($file);

// rename($file,$new_file);

// copy($new_file,$file);
// $a='./a/b/c/bb.txt';
// copy($file,$a);
/* 路径有问题，文件夹不存在
Warning: copy(./a/b/c/bb.txt): failed to open stream: No such file or directory in D:\wampstack-5.6.19-0\apache2\htdocs\zhengke\12-File\2-fileEdit.php on line 31
*/
$newDir='./1';
$oldDir='../2';
rename($oldDir,$newDir);//移动文件夹，包括文件夹的内容