<?php
/**
 * @Author: WMQ
 * @Date:   2017-08-01 15:50:35
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-08-02 20:32:11
 */
// trim(修剪)
$str='    php     ';
var_dump($str);
echo '<hr>';

var_dump(ltrim($str));//过滤左
echo '<hr>';

var_dump(rtrim($str));//过滤右
echo '<hr>';

var_dump(trim($str));//过滤两端
//过滤指定字符
echo '<hr>';
$str='123php!!!';
var_dump($str);
echo '<hr>';

var_dump(ltrim($str,'123'));//左边剔除特定字符
echo '<hr>';

var_dump(rtrim($str,'!'));//右边剔除特定字符
echo '<hr>';

var_dump(trim($str,'123!'));
echo '<hr>';

var_dump(trim($str,'0..9'));//0..9表示0-9
echo '<hr>';

//剔除html和php标签
$str="<a href='#'>hello a</a> <p>php</p>";
$res=strip_tags($str,'<a>');
echo $res;

//自动转义
$str="insert i'm ";
$str='insert i"m" ';
$res=addslashes($str);//本质，让具有特殊意义的符号，转移成普通字符
echo '<hr>'.$res;

//将特殊字符转换成html实体
$str='php + java = <html>';
echo '<hr>'.htmlentities($str);

$str="<h1>你好</h1>";
echo '<hr>'.htmlentities($str);

//将百度的页面原码显示出来
$baiDuContent=file_get_contents('http://www.baidu.com');
echo htmlentities($baiDuContent);

//将字符串中的\n用<br/>替换
echo '<hr>';
$str="ab\nab";
echo nl2br($str);
//比较两个字符串的大小
//如果 str1 小于 str2 返回 < 0； 如果 str1 大于 str2 返回 > 0；如果两者相等，返回 0。
echo '<hr>';
$str1='acc';
$str2='abcdijj';
echo strcmp($str1, $str2);
//忽略大小写的比较字符串的大小
//如果 str1 小于 str2 返回 < 0； 如果 str1 大于 str2 返回 > 0；如果两者相等，返回 0。
echo '<hr>';
echo strcasecmp($str1, $str2);
//使用自然顺序算法比较字符串
//如果 str1 小于 str2 返回 < 0； 如果 str1 大于 str2 返回 > 0；如果两者相等，返回 0。
echo '<hr>';
echo strnatcasecmp($str1, $str2);
//比较字符串的开始的若干个字符
echo '<hr>';
echo strncasecmp($str1, $str2,3);
