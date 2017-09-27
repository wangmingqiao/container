<?php include 'header.html';
      include 'left.html';
?>
    <div style="margin:50px">
    <h2>员工列表</h2>
    <hr>
    <form method="post">
    <table class="table table-bordered" >
        <tr>
            <td style='background-color:#F0F0F0'><p style="font-size:18px">客户分配列表
            <a href="#" class="btn btn-default btn-transparent btn-rounded" style="float:right">添加</a></p></td>
        </tr>
        <tr>
            <td>
                <table class="table table-bordered" >
                    <tr>
                        <th>序号</th>
                        <th>姓名</th>
                        <th>性别</th>
                        <th>年龄</th>
                        <th>电话</th>
                        <th>邮箱</th>
                        <th>基本操作</th>
                    </tr>
                    <?php
                    $host='192.168.12.238';
                    $user='root';
                    $pwd='123456';
                    $db='crm';

                    try{
                        $pdo= new PDO("mysql:host=$host;dbname=$db",$user,$pwd);
                        $row="SELECT count(*) from staff";
                        $num=$pdo->query($row);
                        foreach ($num as $value) {
                            $totalnum=$value[0];
                        }
                        //查询
                        $rownum=4;
                        $pageall=ceil($totalnum/$rownum);
                        @$page=$_GET['p']?$_GET['p']:1;
                        if ($page>=$pageall) {
                            $page=$pageall;
                        }
                        $pagebegin=($page-1)*$rownum;
                        $nextpage=$page+1;
                        $provpage=$page-1;
                        $sql="SELECT * FROM  staff order by y_id limit $pagebegin,$rownum";
                        foreach ($pdo -> query($sql) as $row) {
                            $id=$row['y_id'];
                            echo "<tr>";
                            echo "<td>". $row['y_id']. "</td>";
                            echo "<td>". $row['y_name']. "</td>";
                            echo "<td>". $row['y_sex']. "</td>";
                            echo "<td>". $row['y_age']. "</td>";
                            echo "<td>". $row['y_tel']. "</td>";
                            echo "<td>". $row['y_eamil']. "</td>";
                            echo "<td>";
                            echo "<a href='staff_modi.php?&id=$id'><span class='glyphicon glyphicon-pencil' aria-hidden='true'>编辑&nbsp;</span></a>";
                            echo "<a href='index1.php?action=staff_dele&id=$id'><span class='glyphicon glyphicon-trash' aria-hidden='true'>删除</span></a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    }catch(exception $e){
                        echo $e->getMessage();
                    }
                    ?>
                </table>
                  <p style="float:left">共有<?php echo $totalnum?>条记录,当前第<?php echo $page?>/<?php echo $pageall;?>页</p>

                 <ul class="pager" style="margin-left:500px">
                    <li><a href="staff.php?p=0">首页</a></li>
                    <li><a href="staff.php?p=<?php echo $provpage;?>">上一页</a></li>
                    <li><a href="staff.php?p=<?php echo $nextpage?>">下一页</a></li>
                    <li><a href="staff.php?p=<?php echo $pageall?>">尾页</a></li>
                </ul>
            </td>
        </tr>
    </table>
    </form>
    </div>
<?php include 'footer.html'?>