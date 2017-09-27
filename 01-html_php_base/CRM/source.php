<?php include 'header.html';
      include 'left.html';
?>
     <div style="margin:50px">
            <h2>客户来源</h2>
            <hr />
            <table class="table table-bordered">
                <tr>
                    <td style='background-color:#F0F0F0'><h4>客户来源列表</h4>
                    <a href="source_add.php" class="btn btn-default pull-right" style="margin-top:-37px">添加</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table class="table table-bordered" >
                            <tr>
                                <th>序号</th>
                                <th>客户来源</th>
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
                                    $num="SELECT count(*) from cus_source";
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
                                    $sql="SELECT * FROM cus_source order by s_id limit $pagebegin,$rownum";
                                    // echo $sql;
                                    foreach ($pdo->query($sql) as $row) {
                                        $id=$row['s_id'];
                                        echo "<tr>";
                                        echo "<td>".$row['s_id']."</td>";
                                        echo "<td>".$row['source']."</td>";
                                        echo "<td>";
                                        echo "<a href='index1.php?action=source_dele&id=$id'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span>删除</a>";
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
                            <li><a href="source.php?p=0">首页</a>
                            <li><a href="source.php?p=<?php echo $provpage;?>">上一页</a>
                            <li><a href="source.php?p=<?php echo $nextpage;?>">下一页</a>
                            <li><a href="source.php?p=<?php echo $pageall;?>">尾页</a>
                        </ul>
                    </td>

                </tr>

            </table>

        </div>
<?php include 'footer.html'?>