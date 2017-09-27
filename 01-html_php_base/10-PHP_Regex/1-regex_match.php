<?php
/**
 * @Author: WMQ
 * @Date:   2017-08-03 17:01:17
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-08-03 17:27:37
 */
//PHP中的正则表达式函数
// preg_match(pattern, subject, &subpatterns, flags, offset);
// offet从什么位置去验证是否匹配
// preg_match_all(pattern, subject, &subpatterns, flags, offset);
$str="hellophp@gmail.com,hellojava@163.com";
$regex="#\w+@\w+(\.\w{2,3})+#";

//如果在php中使用正则必须添加定界符(不是正则表达式的符号)
//为了界定增则的开始和结束
//4种
//1./正则表达式/
//2.!正则表达式!
//3.{正则表达式}
//4.#正则表达式#

$res=preg_match($regex,$str,$arr,PREG_OFFSET_CAPTURE);
if ($res) {
    var_dump($arr);
}else{
    echo '邮箱不匹配';
}

$res=preg_match_all($regex,$str,$arr,PREG_OFFSET_CAPTURE);
if ($res) {
    var_dump($arr);
}else{
    echo '邮箱不匹配';
}