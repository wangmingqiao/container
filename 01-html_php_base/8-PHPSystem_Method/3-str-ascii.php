<?php
/**
 * @Author: WMQ
 * @Date:   2017-08-01 15:50:08
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-08-01 15:50:54
 */

$arr=range('a','z');
foreach ($arr as $value) {
    echo '<br>'.ord(strtoupper($value));//65-90
    echo '<br>'.ord($value);//97-122
}

$num=range(65,90);
foreach ($num as $ascii) {
    echo '<br>'.chr($ascii);
}