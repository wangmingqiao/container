<?php include 'header.html';
      include 'left.html';
?>

        <div style="margin:50px">
            <h2>主控板</h2>
            <hr />
            <h4>欢迎你，<i>销售经理</i>-张三，现在是<span id="b"></span></h4>
            <div class="row">
                <div class="col-xs-6" >
                    <table class="table table-bordered" >
                        <tr>
                            <td style='background-color:#F0F0F0'><h4>关怀提醒</h4></td>
                        </tr>
                        <tr>
                            <td>
                                <table class="table table-bordered" >
                                    <tr>
                                        <th>关怀主题</th>
                                        <th>关怀时间</th>
                                        <th>关怀对象</th>
                                    </tr>
                                    <?php
                                        $host = "192.168.12.238";
                                        $user = "root";
                                        $pwd = "123456";
                                        $db= "crm";
                                        try {
                                            // 数据库连接
                                            $pdo = new PDO("mysql:host=$host;dbname=$db",$user,$pwd);
                                            // 查询
                                            $sql="SELECT showtitle,showtime,name FROM cus_show limit 3";
                                            foreach ($pdo->query($sql) as $row) {
                                            echo "<tr>";
                                            echo "<td>".$row['showtitle']."</td>";
                                            echo "<td>".$row['showtime']."</td>";
                                            echo "<td>".$row['name']."</td>";
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
                <div class="col-xs-6" >
                    <table class="table table-bordered" >
                        <tr>
                            <td style='background-color:#F0F0F0'><h4>联系提醒</h4></td>
                        </tr>
                        <tr>
                            <td>
                                <table class="table table-bordered" >
                                    <tr>
                                        <th>联系主题</th>
                                        <th>联系方式</th>
                                        <th>应联系时间</th>
                                    </tr>
                                    <?php
                                        $host = "localhost";
                                        $user = "root";
                                        $pwd = "123456";
                                        $db= "crm";
                                        try {
                                            // 数据库连接
                                            $pdo = new PDO("mysql:host=$host;dbname=$db",$user,$pwd);
                                            // 查询
                                            $sql="SELECT c_title,c_type,c_time FROM contact limit 3";
                                            foreach ($pdo->query($sql) as $row) {
                                            // print_r($row);
                                            echo "<tr>";
                                            echo "<td>".$row['c_title']."</td>";
                                            echo "<td>".$row['c_type']."</td>";
                                            echo "<td>".$row['c_time']."</td>";
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
            <div class="row">
                <div class="col-xs-6" >
                    <table class="table table-bordered" >
                        <tr>
                            <td style='background-color:#F0F0F0'><h4>公告提醒</h4></td>
                        </tr>
                        <tr>
                            <td>
                                <table class="table table-bordered" >
                                    <tr>
                                        <th>公告主题</th>
                                        <th>公告内容</th>
                                        <th>截止时间</th>
                                        <th>公告人</th>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-xs-6" >
                    <table class="table table-bordered" >
                        <tr>
                            <td style='background-color:#F0F0F0'><h4>生日提醒</h4></td>
                        </tr>
                        <tr>
                            <td>
                                <table class="table table-bordered" >
                                    <tr>
                                        <th>过生日的人</th>
                                        <th>生日时间</th>
                                        <th>手机号码</th>
                                        <th>客户状态</th>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <script>
            setInterval( "Time() " , 1000 );//调用方法
            function Time(){
            var today =new Date();
            // alert( today.toString());
            document.getElementById('b').innerHTML=today.toString();
            }
        </script>
<?php include 'footer.html';?>