<?php
/**
 * @Author: WMQ
 * @Date:   2017-08-30 16:29:45
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-08-30 16:36:46
 */
//session 本质，也是将用户需要的数据，保存到本地（服务器）
//cookie所说的本地（客户端所在的电脑）

//session的使用
//开启会话
session_start();
//存数据
$_SESSION['user']='xiaoming';