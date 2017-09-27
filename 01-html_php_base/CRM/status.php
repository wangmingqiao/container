<?php include 'header.html';
      include 'left.html';
?>
      <div style="margin:50px">
            <h2>客户状态</h2>
            <hr />
            <form method="post">
            <table class="table table-bordered">
                <tr>
                    <td style='background-color:#F0F0F0'><h4>客户状态列表</h4>
                        <a href="status_add.php"><button type="button" class="btn btn-default" style="margin-top:-37px;float:right">添加</button></a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table class="table table-bordered" >
                            <tr>
                                <th>序号</th>
                                <th>客户状态</th>
                                <th>状态描述</th>
                                <th>操作</th>
                            </tr>
                            <?php
                                $host = "192.168.12.238";
                                $user = "root";
                                $pwd = "123456";
                                $db= "crm";
                                try {
                                    // 数据库连接
                                    $pdo = new PDO("mysql:host=$host;dbname=$db",$user,$pwd);
                                    $num="SELECT count(*) FROM cus_status";
                                    $num=$pdo->query($num);
                                    foreach ($num as $value) {
                                        $totalnum=$value[0];
                                    }
                                    $total=4;
                                    @$page=$_GET['p']?$_GET['p']:1;
                                    $pageall=ceil($totalnum/$total);
                                    if ($page>=$pageall) {
                                        $page=$pageall;
                                    }
                                    $pagenum=($page-1)*$total;
                                    $provpage=$page-1;
                                    $nextpage=$page+1;

                                    // 查询
                                    $sql="SELECT * FROM cus_status order by id limit $pagenum,$total";
                                    foreach ($pdo->query($sql) as $row) {
                                        $id=$row['id'];
                                        echo "<tr>";
                                        echo "<td>".$row['id']."</td>";
                                        echo "<td>".$row['status']."</td>";
                                        echo "<td>".$row['cus_describe']."</td>";
                                        echo "<td><a href='index1.php?action=status_dele&id=$id'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span>删除</a></td>";
                                        echo "</tr>";
                                    }
                                } catch (Exception $e) {
                                    // Exception 异常
                                    echo $e->getMessage();
                                }
                            ?>
                        </table>
                        <p style="float:left">共有<?php echo $totalnum?>条记录,当前第<?php echo $page?>/<?php echo $pageall?>页</p>
                        <ul class="pager" style="margin-left:400px">
                            <li><a href="status.php?p=0">首页</a>
                            <li><a href="status.php?p=<?php echo $provpage;?>">上一页</a>
                            <li><a href="status.php?p=<?php echo $nextpage;?>">下一页</a>
                            <li><a href="status.php?p=<?php echo $pageall;?>">尾页</a>
                        </ul>
                    </td>
                </tr>
            </table>
            </form>
        </div>
<?php include 'footer.html';?>