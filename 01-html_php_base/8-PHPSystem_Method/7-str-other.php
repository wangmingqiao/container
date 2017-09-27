<?php
/**
 * @Author: WMQ
 * @Date:   2017-08-01 17:22:56
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-08-01 17:41:02
 */
//特殊的
//反转
$str='abc';
echo '<br>'.strrev($str);//cba
//打乱 shuffle-洗牌
$str='abcd';
echo '<br>'.str_shuffle($str);
//重复
$str='-=';
echo '<br>'.str_repeat($str,10);

//解析变量
$url="user=root&pwd=123456";
parse_str($url);
echo '<br>'.$user.$pwd;//root123456
echo '<br>';
//数组
$url="category[]=a+b&type[]=php";
parse_str($url);
var_dump($category);
echo '<br>';

var_dump($type);
echo '<br>';
