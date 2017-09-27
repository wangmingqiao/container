<?php
/**
 * @Author: WMQ
 * @Date:   2017-08-01 15:12:40
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-08-01 15:23:34
 */
//md5
$pwd='123456';
$md5Str=md5($pwd);
echo '<br>'.$md5Str;

//sha1
$sha1=sha1($pwd);
echo '<br>'.$sha1;

//加密
// rsa
// des