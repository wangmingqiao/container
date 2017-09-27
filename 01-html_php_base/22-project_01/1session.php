<?php
/**
 * @Author: WMQ
 * @Date:   2017-08-30 16:32:28
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-08-30 17:00:38
 */
//获取session的内容
session_start();
var_dump($_SESSION);
setcookie(session_name(),session_id(),time()+3600);