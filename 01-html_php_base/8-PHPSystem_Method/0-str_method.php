<?php
/**
 * @Author: WMQ
 * @Date:   2017-08-01 09:59:54
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-08-01 10:34:34
 */
//字符串的格式化输出(通过格式化符号将不同类型的变量和字符串融合)
//使用特定的格式化符号，进行再原字符串中占位
//2.每个格式化符号，一一对应一个变量

//格式化符号
//%d 整形
//%s 字符型
//%f 浮点
//%x 小写16进制
//%X 大写16进制
//格式化的基本语法
//%[补位的字符][字符长度的设置][类型]
$a=1;
printf('<br> 整形%04d',$a);//0001
printf('<br>浮点%.2f',$a);//1.00
$a='a';
printf("<br> 字符 %'o6s",$a);

$a=15;
printf("<br> 16进制%x",$a);

//练习
//1.输出长度为5的数字5
printf('<br> 整形%05d',5);
//2.输出长度为6，小数位为3，的数5.5
printf('<br> %06.3f',5.5);
//3.输出15.98的整数表示法
printf('<br> %d',15.98);
//将数字转化成格式化过的字符串
$a=1;
$a=sprintf("<br>%02d",$a);
echo $a;