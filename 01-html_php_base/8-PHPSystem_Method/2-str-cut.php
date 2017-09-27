<?php
/**
 * @Author: WMQ
 * @Date:   2017-08-01 14:19:01
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-08-02 19:47:47
 */
//字符截取
$str='abcdef';
$subStr=substr($str,0,1);
echo '<br>'.$subStr;//a

$str='abcdef';
$subStr=substr($str,4);
echo '<br>'.$subStr;//ef

$str='abcdef';
$subStr=substr($str,-2);
echo '<br>'.$subStr;//ef

//替换
$str='abcdef';
$subStr=substr_replace($str,'11',2);
echo '<br>'.$subStr;

//a.txt
//b.txt
//c.txt
//d.css
//f.ppp
$files=['a.txt','b.png','c.jpeg'];
//把数组中的后缀全部替换成.php
//
//替换文件的后缀
function changeFile($fileName,$ex='php'){
    $ex='.'.$ex;
    if (strlen(stristr($fileName,'.'))>0) {
        $pos=stripos($fileName,'.');
        return substr_replace($fileName,$ex,$pos);
    }else{
        return $fileName.$ex;
    }
}
foreach ($files as $value) {
    echo '<br>'.changeFile($value);
}
