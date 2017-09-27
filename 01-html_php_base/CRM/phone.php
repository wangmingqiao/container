<?php include 'header.html';
      include 'left.html';
?>
        <div style="margin:50px">
            <h2>联系记录</h2>
            <hr />
            <form method="post">
            <table class="table table-bordered">
                <tr>
                    <td style='background-color:#F0F0F0'><h4>联系记录列表</h4>
                    <a href="phone_add.php" class="btn btn-default pull-right" style="margin-top:-37px">添加</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table class="table table-bordered" >
                            <tr>
                                <th>#</th>
                                <th>客户</th>
                                <th>联系时间</th>
                                <th>下次联系时间</th>
                                <th>联系类型</th>
                                <th>联系主题</th>
                                <th>备注</th>
                                <th>基本操作</th>
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
                                    $num="SELECT count(*) from contact";
                                    $row=$pdo->query($num);
                                    foreach ($row as $value) {
                                        $pagenum=$value[0];
                                    }
                                    // 查询
                                    $rownum = 4;
                                    $pageall=ceil($pagenum/$rownum);
                                    @ $page = $_GET['p']?$_GET['p']:1;
                                    if ($page>=$pageall) {
                                        $page=$pageall;
                                    }
                                    $pagebegin = ($page -1)*$rownum;
                                    $nextpage = $page +1;//下一页
                                    $provpage = $page -1;//上一页
                                    $sql="SELECT * FROM contact order by c_id limit $pagebegin,$rownum";
                                    foreach ($pdo->query($sql) as $row) {
                                    echo "<tr>";
                                    $id=$row['c_id'];
                                    echo "<td>".$row['c_id']."</td>";
                                    echo "<td>".$row['name']."</td>";
                                    echo "<td>".$row['c_time']."</td>";
                                    echo "<td>".$row['next_ctime']."</td>";
                                    echo "<td>".$row['c_type']."</td>";
                                    echo "<td>".$row['c_title']."</td>";
                                    echo "<td>".$row['c_note']."</td>";
                                    echo "<td>";
                                    echo "<a href='index1.php?action=phone_dele&id=$id'><span class='glyphicon glyphicon-trash' aria-hidden='true'>删除</span></a>";
                                    echo"</td>";
                                    echo "</tr>";
                                    }
                                } catch (Exception $e) {
                                    // Exception 异常
                                    echo $e->getMessage();
                                }
                            ?>
                        </table>
                        <p style="float:left">共有<?php echo $pagenum;?>条记录,当前第<?php echo $page?>/<?php echo $pageall ?>页</p>
                        <ul class="pager" style="margin-left:400px">
                            <li><a href="phone.php?p=0">首页</a>
                            <li><a href="phone.php?p=<?php echo $provpage;?>">上一页</a>
                            <li><a href="phone.php?p=<?php echo $nextpage;?>">下一页</a>
                            <li><a href="phone.php?p=<?php echo $pageall;?>">尾页</a>
                        </ul>
                    </td>
                </tr>
            </table>
            </form>

        </div>
<?php include 'footer.html'?>