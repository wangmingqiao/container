<?php
/**
 * @Author: WMQ
 * @Date:   2017-08-04 14:11:57
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-08-04 19:42:01
 */
//preg_split(pattern,subject,limit,flags)
//使用正则 分隔字符串
//参数
//1.正则
//2.匹配目标
//3.次数 默认-1(不限次数)
//4.配置


//使用空格分隔
$str="hello php is hypertext language,programing";
$regex='#[\s,]+#';//分隔符
$rs = preg_split($regex, $str);
var_dump($rs);
echo "<br>";
//配置
//PREF_SPLIT_NO_EMPTY 返回非空结果
$str='programing';
$regex='##';
$rs=preg_split($regex,$str,-1,PREG_SPLIT_NO_EMPTY);
var_dump($rs);
echo "<br>";

//PREG_SPLITE_OFFECT_CAPTURE 偏移量
$str="hello php is hypertext language,programing";
$regex='#[\s,]+#';//分隔符
$rs = preg_split($regex, $str,-1,PREG_SPLIT_OFFSET_CAPTURE);
var_dump($rs);
echo "<br>";

// PREG_SPLIT_DELIM_CAPTURE 模式()中的结果会返回
$str="hello123phpis2344hypertext45language456programing";
$regex='#(\d+)#';//分隔符
$rs = preg_split($regex, $str,-1,PREG_SPLIT_DELIM_CAPTURE);
var_dump($rs);
echo "<br>";

//练习
// <td colspan="2" rowspan="2" bgcolor="reg">
// 获得属性和属性的值，并存储在一个数组中，属性key 值value
$str='<td colspan="2" rowspan="2" bgcolor="reg">';
$str=trim($str,"<td>");
//使用空格分隔得到单独的属性
$res = preg_split('#\s#', $str,-1,PREG_SPLIT_NO_EMPTY);
// array(3) {
//   [0]=>
//   string(11) "colspan="2""
//   [1]=>
//   string(11) "rowspan="2""
//   [2]=>
//   string(13) "bgcolor="reg""
// }
//对单独属性字符串进行处理
foreach ($res as $value) {
    //使用=号爆炸
    $arr=explode('=',$value);
// array(2) {
//   [0]=>
//   string(7) "colspan"
//   [1]=>
//   string(3) ""2""
// }
// array(2) {
//   [0]=>
//   string(7) "rowspan"
//   [1]=>
//   string(3) ""2""
// }
// array(2) {
//   [0]=>
//   string(7) "bgcolor"
//   [1]=>
//   string(5) ""reg""
// }
    //还可以使用preg_slit分隔
    // $arr=preg_split('#=#',$value);
    list($key,$value) = $arr;
    $data[$key]=trim($value,'"');
}
var_dump($data);

// array(3) {
//   ["colspan"]=>
//   string(1) "2"
//   ["rowspan"]=>
//   string(1) "2"
//   ["bgcolor"]=>
//   string(3) "reg"
// }
