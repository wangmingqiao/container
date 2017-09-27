<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <script src='js/jquery-3.2.1.min.js'></script>
        <script src='js/bootstrap.min.js'></script>
    </head>
    <body>
    <div class="containe-fluid">
        <div class="container"  style="width:1200px;margin:0 auto;">
            <div class="navbar navbar-inverse">
                <div class="container">
                    <div class="navbar-form navbar-left" >
                        <strong><h4><span class="text-muted">学生信息</span></h4></strong>
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="add.php">添加</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown">更多<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">按照年龄分组</a></li>
                                <li><a href="#">按照性别分组</a></li>
                                <li class="divider"></li>
                                <li><a href="#">清空数据</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="container">
                <table class="table table-bordered">
                    <tr>
                        <td style='background-color:#F0F0F0'><h4>学生信息</h4>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table class="table table-bordered" >
                                <tr>
                                    <th>#</th>
                                    <th>姓名</th>
                                    <th>性别</th>
                                    <th>年龄</th>
                                    <th>班级</th>
                                    <th>操作</th>
                                </tr>
                                <?php
                                    $host = "localhost";
                                    $user = "root";
                                    $pwd = "123456";
                                    $db= "kaoshi";
                                    try {
                                        // 数据库连接
                                        $pdo = new PDO("mysql:host=$host;dbname=$db",$user,$pwd);
                                        // 查询
                                        $sql="SELECT * FROM kaoshi";
                                        foreach ($pdo->query($sql) as $row) {
                                        echo "<tr>";
                                        echo "<td>".$row['id']."</td>";
                                        echo "<td>".$row['name']."</td>";
                                        echo "<td>".$row['sex']."</td>";
                                        echo "<td>".$row['age']."</td>";
                                        echo "<td>".$row['class']."</td>";
                                        echo "<td>";
                                        echo "<a><span class='glyphicon glyphicon-trash' aria-hidden='true'></span>删除</a>&nbsp;/<a><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>编辑</a>";
                                        echo"</td>";
                                        echo "</tr>";
                                        }
                                    } catch (Exception $e) {
                                        // Exception 异常
                                        echo $e->getMessage();
                                    }
                                ?>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    </body>
</html>