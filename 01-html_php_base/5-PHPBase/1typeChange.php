<?php
/**
 * @Author: WMQ
 * @Date:   2017-07-27 09:52:10
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-07-28 13:26:44
 */
// 类型转换
$a=0;

if ($a) {

}else{
    echo "主动转换成bool";
}
echo $a;
echo "<hr>";


$a='';
if ($a) {

}else{
    echo "string ->bool";
}
echo $a;
echo "<hr>";


$a=null;
if ($a) {
    # code...
}else{
    echo "null->bool";
}
echo $a;
echo "<hr>";


$a=array();
if ($a) {
    # code...
}else {
    echo "array()--->bool";
}
echo $a;
echo "<hr>";


// 转换
$a='123abc';
echo (boolean)$a;//只在这一行生效
echo "<hr>";


// 函数转换
echo intval($a);//123
echo "<hr>";


var_dump($a);//string
echo "<hr>";


// 永久转换
settype($a,'integer');
var_dump($a);//int(123)
echo "<hr>";

echo gettype($a);
echo "<hr>";
