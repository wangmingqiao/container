<?php
/**
 * @Author: WMQ
 * @Date:   2017-07-26 11:36:28
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-07-26 12:05:10
 */

// 定义常量
define('CLASS_NUM',7);

const CLASS_NAME='PHP';


echo CLASS_NUM,CLASS_NAME;
echo PHP_VERSION,PHP_OS,M_PI;
echo "<hr>";
echo __LINE__,__DIR__,__FILE__;


echo "<hr>";
$name='CLASS_NAME';
if (defined($name)) {
    echo constant($name);
}else{
    echo"常量未定义";
}


$consArr=get_defined_constants(true);
var_dump($consArr);
