<?php include 'header.html';
      include 'left.html';
?>
    <div style="margin:50px">
        <h2>客户分配</h2>
        <hr>
        <form method="post" action="index1.php?action=cus_update">
        <table class="table table-bordered" >
            <tr>
                <td style='background-color:#F0F0F0'><h4>客户分配列表</h4></td>
            </tr>
            <tr>
                <td>
                    <table class="table table-bordered" >
                    <div class="form-group" style="margin-left:100px;margin-right:100px">
                        <label class="col-xs-2 control-label">客户姓名</label>
                        <div class="col-xs-8">
                        <?php
                            $host='192.168.12.238';
                            $user='root';
                            $pwd='123456';
                            $db='crm';
                            $pdo= new PDO("mysql:host=$host;dbname=$db",$user,$pwd);
                            $id=$_GET['id'];
                            $sql="SELECT name FROM customer WHERE c_id='$id'";
                            foreach ($pdo -> query($sql) as $value) {
                                $name = $value['name'];
                                echo "<input type='test' class='form-control' value='$name' method='post' name='t_test'>";
                                $id = $_GET['id'];
                                echo "<input type='hidden' value='$id' name = 'c_id'>";
                            }
                            // var_dump($_GET);
                        ?>
                     </div>
                     <div class="col-xs-2"></div>
                    </div>
                    </table>

                    <table class="table table-bordered" >
                    <div class="form-group" style="margin-left:100px;margin-right:100px">
                    <?php
                        $host='192.168.12.238';
                        $user='root';
                        $pwd='123456';
                        $db='crm';
                        $pdo= new pdo("mysql:host=$host;dbname=$db",$user,$pwd);
                        // $c_id=$_GET['c_id'];
                        $sql= "SELECT c_id FROM customer";
                        foreach ($pdo -> query($sql) as $value) {
                            $c_id=$value['c_id'];
                        }
                    ?>
                        <label class="col-xs-2 control-label">负责员工</label>
                        <div class="col-xs-8" >

                             <?php
                                    $host='192.168.12.238';
                                    $user='root';
                                    $pwd='123456';
                                    $db='crm';
                                    $pdo= new pdo("mysql:host=$host;dbname=$db",$user,$pwd);
                                    $arr=array();
                                    $sql="SELECT y_name FROM staff";
                                    foreach ($pdo -> query($sql) as $value) {
                                      $name=$value['y_name'];
                                      $arr[]=$name;
                                    }
                                    echo "<select class='form-control' name='y_name' >";
                                    foreach ($arr as $val) {
                                      echo "<option value='$val'>".$val."</option>";
                                    }
                                    echo " </select>";
                                  ?>
                        </div>
                        <div class="col-xs-2"></div>
                     </div>
                    </table>
                    <div style='margin-left:300px'>
                        <button type="sumbit" class="btn btn-primary">提交</button>
                    </div>
            </td>
            </tr>
         </table>
        </form>
    </div>
<?php include 'footer.html'?>


