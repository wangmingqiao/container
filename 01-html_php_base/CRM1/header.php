<?php

@session_start();
if (!isset($_SESSION['user_id'])) {
    header("refresh:1;url=/index.php");
    exit('非法操作...');
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>CRM客户关系管理系统</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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
          <a class="navbar-brand" href="#">房地产客户关系管理系统</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" data-toggle="dropdown">销售经理-<?php echo $_SESSION['user_name']; ?> <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">个人信息</a></li>
                <li><a href="#">登录设置</a></li>
                <li class="divider"></li>
                <li><a href="action.php?action=login_out">安全退出</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="action.php?action=home">主控板</a></li>
            <li class="active"><a href="">客户相关<span class="sr-only">(current)</span></a></li>
            <li><a href="action.php?action=customer_info">客户信息</a></li>
            <?php if($_SESSION['role_id']=='1'):?>
            <li><a href="action.php?action=customer_allot">客户分配</a></li>
            <?php endif;?>
            <li><a href="action.php?action=customer_care">客户关怀</a></li>
            <li><a href="action.php?action=customer_type">客户类型</a></li>
            <li><a href="action.php?action=customer_status">客户状态</a></li>
            <li><a href="action.php?action=customer_source">客户来源</a></li>
            <li><a href="action.php?action=customer_linkreord">客户记录</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <?php if($_SESSION['role_id']=='1'):?>
            <li class="active"><a href="">员工相关<span class="sr-only">(current)</span></a></li>
            <li><a href="action.php?action=staff_info">员工信息</a></li>
            <li><a href="action.php?action=notice_info">公告信息</a></li>
            <?php endif;?>
          </ul>
        </div>

