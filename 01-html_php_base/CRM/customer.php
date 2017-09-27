<?php include 'header.html';
      include 'left.html';
?>
        <div style="margin:50px">
            <h2>客户信息</h2>
            <hr />
            <table class="table table-bordered" >
                <tr>
                    <td style='background-color:#F0F0F0'><h4>客户信息列表</h4>
                        <a href="customer_add.php"><button type="submit" class="btn btn-default" style="margin-top:-37px;float:right">添加</button></a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table class="table table-bordered" >
                            <tr>
                                <th>姓名</th>
                                <th>状态</th>
                                <th>来源</th>
                                <th>所属员工</th>
                                <th>类型</th>
                                <th>性别</th>
                                <th>手机</th>
                                <th>QQ</th>
                                <th>邮箱</th>
                                <th>职位</th>
                                <th>公司</th>
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
                                    $num="SELECT count(*) from customer";
                                    $row=$pdo->query($num);
                                    foreach ($row as $value) {
                                        $pagenum=$value[0];
                                    }
                                    // 查询
                                    $rownum = 3;
                                    $pageall=ceil($pagenum/$rownum);
                                    @ $page = $_GET['p']?$_GET['p']:1;
                                    if ($page>=$pageall) {
                                        $page=$pageall;
                                    }
                                    $pagebegin = ($page -1)*$rownum;
                                    $nextpage = $page +1;//下一页
                                    $provpage = $page -1;//上一页
                                    // 查询
                                    $sql="SELECT * FROM customer order by c_id limit $pagebegin,$rownum";
                                    foreach ($pdo->query($sql) as $row) {
                                    // print_r($row);
                                    $id=$row['c_id'];
                                    echo "<tr>";
                                    echo "<td>".$row['name']."</td>";
                                    echo "<td>".$row['status']."</td>";
                                    echo "<td>".$row['source']."</td>";
                                    echo "<td>".$row['y_name']."</td>";
                                    echo "<td>".$row['type']."</td>";
                                    echo "<td>".$row['sex']."</td>";
                                    echo "<td>".$row['tel']."</td>";
                                    echo "<td>".$row['QQ']."</td>";
                                    echo "<td>".$row['email']."</td>";
                                    echo "<td>".$row['position']."</td>";
                                    echo "<td>".$row['company']."</td>";
                                    echo "<td>".$row['note']."</td>";
                                    echo"<td>";
                                    echo "<a href='customer_modi.php?action=cus_upda&id=$id'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>编辑</a><br><a href='index1.php?action=cus_dele&id=$id'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span>删除</a>";
                                    echo"</td>";
                                    echo "</tr>";
                                    }
                                } catch (Exception $e) {
                                // Exception 异常
                                    echo $e->getMessage();
                                }
                            ?>
                        </table>
                        <p style="float:left">共有<?php echo $pagenum;?>条记录,当前第<?php echo "$page"."/"."$pageall"?>页</p>
                        <ul class="pager" style="margin-left:400px">
                            <li><a href="customer.php?p=0">首页</a>
                            <li><a href="customer.php?p=<?php echo $provpage;?>">上一页</a>
                            <li><a href="customer.php?p=<?php echo $nextpage;?>">下一页</a>
                            <li><a href="customer.php?p=<?php echo $pageall;?>">尾页</a>
                        </ul>
                    </td>

                </tr>

            </table>

        </div>
<?php include 'footer.html';?>