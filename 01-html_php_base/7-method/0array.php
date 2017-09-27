<?php
/**
 * @Author: WMQ
 * @Date:   2017-07-31 11:12:00
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-07-31 18:55:48
 */
// 数组 +
// 使用+联合数组 如果两个数组键重复,那么+左边的优先;并不会被+右边的覆盖
$a=['a','b','c'];
$b=['1','2','3'];
$c=$a+$b;
var_dump($c);// a b c

echo"<hr>";
$a=['a','b'];
$b=[2=>'c',3=>'d'];
$c=$a+$b;
var_dump($c);// a b c d

// 数组的==
$a=['a','b'];
$b=['0'=>'a','1'=>'b'];
// $b=[false=>'a',true=>'b'];
if ($a==$b) {
    echo'<br>数组相等';
}
//全等
$a=['a','b'];
$b=['0'=>'a','1'=>'b'];
// $b=[false=>'a',true=>'b'];
// $b=[1=>'b',0=>'a'];
if ($a===$b) {
    echo'<br>数组全等';
}