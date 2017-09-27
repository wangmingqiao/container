<?php
/**
 * @Author: WMQ
 * @Date:   2017-08-01 17:05:55
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-08-02 21:01:26
 */
//拆分和组合
//explore(separator(分割),str)
$str='a:b';
$arr=explode(":",$str);
var_dump($arr);//a b
//课下练习
//实现 模仿系统函数 array('a:b','0:a','1:b');


//implode(内爆)(glue(粘合),pieces(零件));
$a=range('a','z');
$str=implode('-',$a);
echo '<br>'.$str;
echo '<br>';


//字符串转换成数组
$str='abcdefg';
echo $str{0};//a
echo '<br>';
echo $str{0};//a
echo '<br>';

// str_split($str);
$strArr=str_split($str,2);
var_dump($strArr);