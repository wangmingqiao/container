<?php

@session_start();
if (!isset($_SESSION['user_id'])) {
    header("refresh:1;url=/index.php");
    exit('非法操作...');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/static/css/bootstrap.css">
    <script src="/static/js/jquery-3.2.1.min.js"></script>
    <script src="/static/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="/static/css/home.css">
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">CRM客户管理系统</a>
        </div>
        <di
<div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown"> <a data-toggle="dropdown" class="dropdown-toggle" href="#"><?php echo $_SESSION['user_name']; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">个人信息设置</a></li>
                        <li class="divider"></li>
                        <li><a href="/action.php?act=login_out">安全退出</a></li>
                    </ul>
                </li>>

            </ul>

        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">

            <ul class="nav nav-sidebar">
                <li class="text-center" style="color:black ;font-size: 15px"> <strong>首页</strong></li>
                <li class=""><a href="/action.php?act=home">主面板 </a></li>
                <li class="text-center" style="color:black ;font-size: 15px"> <strong>客户相关</strong></li>
                <li ><a href="/action.php?act=customer_info">客户信息 </a></li>
                <?php if ($_SESSION['role_id']=='1'):?>
                <li ><a href="/action.php?act=customer_allot">客户分配</a></li>
                <?php endif;?>
                <li ><a href="/action.php?act=customer_care">客户关怀</a></li>
                <li ><a href="/action.php?act=customer_type">客户类型</a></li>
                <li ><a href="/action.php?act=customer_status">客户状态</a></li>
                <li ><a href="/action.php?act=customer_source">客户来源</a></li>
                <li ><a href="/action.php?act=customer_linkrecord">联系记录</a></li>
                <?php if ($_SESSION['role_id']=='1'):?>
                <li class="text-center" style="color:black ;font-size: 15px"> <strong>员工相关</strong></li>
                <li ><a href="/action.php?act=user_info">员工信息</a></li>
                <li ><a href="/action.php?act=notic">公共信息</a></li>
                <?php endif;?>
            </ul>

        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">