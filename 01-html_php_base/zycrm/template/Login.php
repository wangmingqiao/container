<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../static/css/bootstrap.css">
    <script src="../static/js/jquery-3.2.1.min.js"></script>
    <script src="../static/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="../static/css/login.css">
</head>
<body>
<div class="container">
    <form class="form-signin" method="POST">
        <h3 class="form-signin-heading text-center">CRM客户关系管理系统</h3>
        <label for="inputEmail" class="sr-only">邮箱</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="邮箱" name="email" required autofocus>
        <label for="inputPassword" class="sr-only">密码</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="密码" name="password" required>
        <div class="checkbox">
            <label>
                <input type="checkbox" value="remember-me">保持登陆状态
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">登陆</button>
    </form>

</div> <!-- /container -->

</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/24
 * Time: 14:49
 */

// var_dump($_POST);
?>