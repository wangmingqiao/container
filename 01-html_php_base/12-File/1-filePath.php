<?php
/**
 * @Author: WMQ
 * @Date:   2017-08-07 14:09:17
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-08-07 14:37:07
 */
//路径
//相对路径
//相对于当前目录，相对于上级目录
//.当前目录
//..上级目录
// /fileDir/a.txt
// ./fileDir/a.txt
// ../readme.md
//
// 绝对路径
// 全路径 D:/wampstack-5.6.19-0/apache2/htdocs/zhengke/12-File
//
// linux的路径分隔和wind的路径分隔
// win：\
// linux:/
// PHP提供一个常量表示分隔符
// DIRECTORY_SEPARATOR
echo DIRECTORY_SEPARATOR;//

// 远程地址
// 相对路径和本地地址的相对路径一样
// 绝对路径
// 本地：c:\a\b\c
// 远程：http://www.baidu.com/index.html
// php路径的函数
// basename(path,suffix);路径下文件的名字
// dirname(path);路径下文件夹的名字
// pathinfo(path, options);路径的一些信息

$url='.aaa/bbb/ccc/index.php';
$aurl="c:/aaa/bbb/ccc/aindex.php";
$burl="https://www.baidu.com";

echo '<br>' . basename($url);
echo '<br>' . basename($aurl);
echo '<br>' . dirname($url);
echo '<br>' . dirname($aurl);

echo '<br>';
var_dump(pathinfo($url));
echo '<br>';
var_dump(pathinfo($aurl));
echo '<br>';
var_dump(pathinfo($burl));

