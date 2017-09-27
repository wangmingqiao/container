<?php
/**
 * @Author: WMQ
 * @Date:   2017-08-01 11:02:28
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-08-02 16:38:45
 */
//字符串查找方法

//字符串长度
$a='hello php';
$len=strlen($a);
echo $len;//9(空格也算)
echo '<br>';
//查找，某个字符在字符串中的某个位置
$str='hello php';
$finStr='php';
$pos=strpos($str,$finStr);
echo $pos;
echo '<br>';

$str='hello php php php';
$finStr='php';
$pos1=strripos($str, $finStr);
echo $pos1;
echo '<br>';

$str='abcdef abcdef';
$finStr='a';
//第三个参数 offset 设置查找的其实位置如果是负数，从字符串的结尾开始查
$pos=strpos($str,$finStr,1);
echo '<br>'.$pos;
//查找字符位置，并返回一些结果
$str='aa123@163.com';
$email=strstr($str,"@");//默认返回找到的字符位置后面的字符串
echo '<br>'.$email;

$email=strstr($str,'@',true);//返回找到字符位置前面的字符串
echo '<br>'.$email;

//strrchr 查找最后一次出现的位置，并返回后面的内容
$str='www.baidu.com';
$com=strrchr($str,'.');
echo '<br>'.$com;

//练习
//www.baidu.com.cn
//如何将
//.baidu
//.com
//.cn
// $str='www.baidu.com.cn';



//替换
$subject='我要变有钱,有很多钱';
$search='钱';
$replace='才';
$res=str_replace($search, $replace,$subject);
echo '<br>'.$res;
//替换
$subject='<body bgcolor=%color%>';
$search='%color%';
$replace='yellow';
$res=str_replace($search, $replace, $subject);
echo '<br>'.$res;

//search -数组
$subject='hello php 7 ni hao';
$search=['h','o'];
$replace='';
$res=str_replace($search, $replace, $subject);
echo '<br>'.$res;

//search -数组 replace--数组
$subject='我要有钱,有车,有房,有存款';
$search=['钱','车','房','存款'];
$replace=['才','颜值','身材','粉丝'];
$res=str_replace($search, $replace, $subject);
echo '<br>'.$res;

//例子
$subject=['A','B'];
$search=['A','B','C','D','E'];
$replace=['B','C','D','E','F'];
$res=str_replace($search, $replace, $subject);
print_r($res);


//字符串大小写
$str='Hello World!';
echo '<br>'.strtolower($str);
echo '<br>'.strtoupper($str);
echo '<br>'.ucwords($str);//单词首字母
echo '<br>'.ucfirst($str);//字符串首字母
echo '<br>'.lcfirst($str);//字符串首字母

