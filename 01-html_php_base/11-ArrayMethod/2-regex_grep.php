<?php
/**
 * @Author: WMQ
 * @Date:   2017-08-04 15:18:59
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-08-04 15:33:55
 */
// preg_grep(regex,input,flags);
// 匹配数组中的元素
// 参数
// 1.正则
// 2.数组
// 3.配置

$a=['a','b','c','1','2','3'];
//筛选数组中所有的数字
$res=preg_grep("#\d#",$a);
var_dump($res);//1 2 3

$a=['a','b','c','1','2','3'];
//筛选数组中所有的除数字之外的
$res=preg_grep("#\d#",$a,PREG_GREP_INVERT);
var_dump($res);//a b c

//[a-zA-Z0-1]
$str='中华人民共和国';
//匹配中文的编码范围
$regexChina='#[\x80-\xff]{3}+#';
$rs=preg_match_all($regexChina,$str,$data);
var_dump($data);