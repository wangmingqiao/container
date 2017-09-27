<?php include 'header.html';
      include 'left.html';
?>
    <div style="margin:50px">
    <h2>客户分配</h2>
    <hr>
    <form action="cus_allot.php?action=add" method="post">
    <table class="table table-bordered" >
        <tr>
            <td style='background-color:#F0F0F0'><h4>客户分配列表</h4></td>
        </tr>
        <tr>
            <td>
                <table class="table table-bordered" >
                    <tr>
                        <th>姓名</th>
                        <th>状态</th>
                        <th>来源</th>
                        <th>类型</th>
                        <th>创建时间</th>
                        <th>公司</th>
                        <th>备注</th>
                        <th>基本操作</th>
                    </tr>

                    <?php

                    $host='192.168.12.238';
                    $user='root';
                    $pwd='123456';
                    $db='crm';
                    try{
                        $pdo= new PDO("mysql:host=$host;dbname=$db",$user,$pwd);

                        $sq="SELECT count(*) FROM customer";
                        $r=$pdo -> query($sq);
                        // echo $r;
                        foreach ($r as $va) {
                            $rowt=$va[0];
                        }
                        $rownum=2;
                        @$page=$_GET['p']?$_GET['p']:1;
                        $pagenum=ceil($rowt/$rownum);
                        if ($page>=$pagenum) {
                            $page=$pagenum;
                        }
                        $pagebegin=($page-1)*$rownum;
                        $provpage=$page-1;
                        $nextpage=$page+1;
                        //查询
                        $sql="SELECT c_id,name,status,source,type,creat_time,company,note FROM  customer inner join cus_allot ON customer.c_id=cus_allot.id order by c_id limit $pagebegin,$rownum";
                        foreach ($pdo -> query($sql) as $row) {

                            $id=$row['c_id'];
                            // print_r($id);
                            echo "<tr>";
                            echo "<td>".$row['name']."</td>";
                            echo "<td>".$row['status']. "</td>";
                            echo "<td>".$row['source']. "</td>";
                            echo "<td>".$row['type']."</td>";
                            echo "<td>".$row['creat_time']."</td>";
                            echo "<td>".$row['company']. "</td>";
                            echo "<td>".$row['note']."</td>";
                            echo "<td>";
                            echo "<a href='cus_allot_add.php?id=$id'><span class='glyphicon glyphicon-user' aria-hidden='true' >分配</span></a>";
                            echo "</td>";
                            echo "</tr>";
                        }


                    }catch(exception $e){
                        echo $e->getMessage();
                    }

                    ?>

                </table>
                  <p style="float:left">共有<?php echo $rowt ?>条记录,当前第<?php echo "$page"."/"."$pagenum" ?>页</p>

                 <ul class="pager" style="margin-left:500px">
                            <li><a href="cus_allot.php?p=1">首页</a></li>
                            <li><a href="cus_allot.php?p=<?php echo $provpage;?>">上一页</a></li>
                            <li><a href="cus_allot.php?p=<?php echo $nextpage;?>">下一页</a></li>
                            <li><a href="cus_allot.php?p=<?php echo $pagenum;?>">尾页</a></li>
                        </ul>

            </td>
         </tr>
    </table>
    </form>
    </div>
<?php include 'footer.html'?>



