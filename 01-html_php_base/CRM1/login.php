<?php
/**
 * @Author: WMQ
 * @Date:   2017-08-30 18:11:03
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-08-30 19:55:12
 */
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
         <link rel="stylesheet" href="static/css/bootstrap.min.css" />
        <script src='static/js/jquery-3.2.1.min.js'></script>
        <script src='static/js/bootstrap.min.js'></script>
        <style>
            .contain{
                display: flex;
                align-items: center;
                justify-content: center;
                margin-top: 300px;
            }
            body{
                background-color: #E8E8E8 ;
            }
        </style>
    </head>
    <body>
    <div class="contain">
      <form class="form-signin" method="post">
          <div class="form-group">
            <table height="200px">
                <tr align="center" height="100px">
                    <td><h2>房地产客户关系管理系统</h2></td>
                </tr>
                <tr>
                    <td>
                        <input type="email" id="inputEmail" class="form-control" placeholder="邮箱" name="email" required autofocus>
                        <input type="password" id="inputPassword" class="form-control" placeholder="密码" name="password" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                  <input type="checkbox" value="remember-me" name="autologin">保持登录状态
                                </label>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                    <button type="submit" class="btn btn-primary" style="width:400px">登录</button>
                    </td>
                </tr>
            </table>
            </div>
        </form>
        </div>
    </body>
</html>
