<?php include 'header.html';
      include 'left.html';
?>
    <div style="margin:50px">
    <h2>客户关怀</h2>
    <hr>
    <table class="table table-bordered" >
        <tr>
            <td style='background-color:#F0F0F0'><p style="font-size:18px">客户关怀列表
            <a href="cus_show_add.php?" class="btn btn-default btn-transparent btn-rounded" style="float:right">添加</a></p></td>
        </tr>
        <tr>
            <td>
                <table class="table table-bordered" >
                    <tr>
                        <th>#</th>
                        <th>客户</th>
                        <th>关怀主体</th>
                        <th>关怀方式</th>
                        <th>关怀时间</th>
                        <th>下次关怀时间</th>
                        <th>备注</th>
                        <th>关怀人</th>
                        <th>基本操作</th>
                    </tr>
                     <?php
                        $host='192.168.12.238';
                        $user='root';
                        $pwd='123456';
                        $db='crm';
                        try{
                            $pdo= new PDO("mysql:host=$host;dbname=$db",$user,$pwd);
                            $sq="SELECT count(*) FROM cus_show";
                            $r=$pdo -> query($sq);
                            // echo $r;
                            foreach ($r as $va) {
                                $rowt=$va[0];
                            }
                            $rownum=4;
                            @$page=$_GET['p']?$_GET['p']:1;
                            $pagenum=ceil($rowt/$rownum);
                            if ($page>=$pagenum) {
                                $page=$pagenum;
                            }
                            $pagebegin=($page-1)*$rownum;
                            $provpage=$page-1;
                            $nextpage=$page+1;
                        //查询
                        $sql="SELECT * FROM  cus_show order by id limit $pagebegin,$rownum";
                        foreach ($pdo -> query($sql) as $row) {
                            $id=$row['id'];
                            echo "<tr>";
                            echo "<td>". $row['id']. "</td>";
                            echo "<td>". $row['name']. "</td>";
                            echo "<td>". $row['showtitle']. "</td>";
                            echo "<td>". $row['showway']. "</td>";
                            echo "<td>". $row['showtime']. "</td>";
                            echo "<td>". $row['nexttime']. "</td>";
                            echo "<td>". $row['note']."</td>";
                            echo "<td>". $row['y_name']."</td>";
                            echo "<td>";
                            echo "<a href='cus_show_mod.php?action=cus_up&id=$id'><span class='glyphicon glyphicon-pencil' aria-hidden='true'>编辑&nbsp;</span></a>";
                            echo "<a href='index1.php?action=cus_show_dele&id=$id'><span class='glyphicon glyphicon-trash' aria-hidden='true'>删除</span></a>";
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
                    <li><a href="cus_show.php?p=1">首页</a></li>
                    <li><a href="cus_show.php?p=<?php echo $provpage;?>">上一页</a></li>
                    <li><a href="cus_show.php?p=<?php echo $nextpage;?>">下一页</a></li>
                    <li><a href="cus_show.php?p=<?php echo $pagenum;?>">尾页</a></li>
                </ul>
            </td>
        </tr>
    </table>
    </div>
<?php include 'footer.html'?>