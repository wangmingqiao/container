<?php
/**
 * @Author: WMQ
 * @Date:   2017-08-04 10:51:10
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-08-04 19:19:33
 */
//1.正则替换
//preg_replace 使用正则替换
//参数
//1.正则
//2.替换的内容
//3.搜索的目标
//4.替换的次数
//5.替换次数统计
// preg_replace(regex, replace, subject, limit, &count)
// 返回值
// 如果subject是一个数组，preg_replace()返回一个数组，其他情况下返回一个字符串


// 删除字符串中的数字
$str='abcdefg23dsfs53';
$regex='#\d#';
$replace='';
$res=preg_replace($regex, $replace, $str,-1,$count);
echo $res;
echo "次数{$count}";

//位置替换
$str="april 15 2017";//2017 15 april
$regex="#(\w+) (\d+) (\d+)#";
// $replace='\3 \2 \1';//等价$3 $2 $1
$replace='$3 $2 $1';//等价$3 $2 $1
$res=preg_replace($regex, $replace, $str,-1,$count);
echo '<br>';
echo $res;

//练习
$str="<startData>=1999-5-27";//startDate=27/5/1999
$regex='#<(\w+)>=(\d+)-(\d+)-(\d+)#';
$replace='$1=$4/$3/$2';
$res=preg_replace($regex, $replace, $str,-1,$count);
echo'<br>';
echo $res;

//数组替换，正则是数组，替换是数组
$regexArr=['#<(\w+)>=#','#(\d+)-(\d+)-(\d+)#'];
$replaceArr=['$1=','$3/$2/$1'];
$res=preg_replace($regexArr, $replaceArr, $str,-1,$count);
echo'<br>';
echo $res;

//数组替换，目标是数组，正则是数组，替换是数组
$strArr=['abc@163.com','abc@sina.com'];//user:abc email:163.com
$regexArr=['#(\w+)@#','#@(\w+\.\w+)#'];
$replaceArr=['user:$0', 'email:$1'];//一个分两部替换，替换数组第二个元素会在第一个元素替换结果的基础上替换
// $0完整正则的替换结果
$rs=preg_replace($regexArr, $replaceArr, $strArr,-1,$count);
echo '<br>';
var_dump($rs);


