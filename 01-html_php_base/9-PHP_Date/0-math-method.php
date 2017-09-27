<?php
/**
 * @Author: WMQ
 * @Date:   2017-08-02 09:46:14
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-08-02 10:04:57
 */
//常用的数学函数
$a=-1;
$b=10;
echo '<br>'. abs($a-$b);//11

//进一取整
echo '<br>'.ceil(1.1);//2

//舍去小数取整
echo '<br>'.floor(1.9);//1

//四舍五入
echo '<br>'.round(4.5);//5
echo '<br>'.round(4.565,2);//4.57

// 幂运算
echo '<br>'.pow(2,10);//1024

//平方根
echo '<br>'.sqrt(100);//10

//最大
echo '<br>'.max(3,4);//4
echo '<br>'.max(range(0,10,2));//10
// 最小
echo '<br>'.min(3,4);//3

//随机数
echo '<br>'.mt_rand(0,16);//随机
echo '<br>'.rand()%100;//0-100随机
echo '<br>'.rand(0,100);//0-100随机

