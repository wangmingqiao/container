<?php include 'header.html';
      include 'left.html';
      // include 'cus_show_modi.php';
?>
      <?php
      $host='192.168.12.238';
      $user='root';
      $pwd='123456';
      $db='crm';
      $pdo= new pdo("mysql:host=$host;dbname=$db",$user,$pwd);
      $id=$_GET['id'];
      // $res = $pdo->query($sql);
      try {
        $sql  = "SELECT * FROM  cus_show";
        foreach ($pdo->query($sql) as $res) {
        }
      } catch (Exception $e) {
        echo $e->getMessage;
      }
      ?>
    <div style="margin:50px">
        <h2>修改关怀</h2>
        <hr>
        <form method='post' action="index1.php?action=m_update&id=<?php echo $id;?>">
        <table class="table table-bordered" >
            <tr>
                <td style='background-color:#F0F0F0'><h4>修改关怀信息</h4></td>
            </tr>
            <tr>
                <td>
                    <table style="margin:10px;width:100%;height:300px">
                     <tr>
                         <td class="col-sm-6">
                             <div class="form-group" >
                                <label class="col-sm-3 control-label">关怀主体</label>
                                <div class="col-sm-9">
                                  <input type="test" class="form-control" name="showtitle" value="<?php echo $res['showtitle'];?>">
                             </div>
                            </div>
                         </td>
                         <td class="col-sm-6">
                             <div class="form-group" >
                                <label class="col-sm-3 control-label">关怀对象</label>
                                <div class="col-sm-9">

                                  <?php
                                    $host='192.168.12.238';
                                    $user='root';
                                    $pwd='123456';
                                    $db='crm';
                                    $pdo= new pdo("mysql:host=$host;dbname=$db",$user,$pwd);
                                    $arr=array();
                                    $sql="SELECT name FROM cus_show";
                                    // echo $sql;
                                    foreach ($pdo -> query($sql) as $value) {
                                      $name=$value['name'];
                                      $arr[]=$name;
                                    }
                                    echo "<select class='form-control' name='name' >";
                                    foreach ($arr as $val) {
                                      echo "<option value='$val'>".$val."</option>";
                                    }
                                    echo " </select>";
                                  ?>
                             </div>
                            </div>
                         </td>
                     </tr>
                     <tr>
                         <td class="col-sm-6">
                             <div class="form-group" >
                                <label class="col-sm-3 control-label">关怀时间</label>
                                <div class="col-sm-9">
                                  <input type="test" class="form-control" name="showtime" value="<?php echo $res['showtime'] ?>">
                             </div>
                            </div>
                         </td>
                         <td class="col-sm-6">
                             <div class="form-group" >
                                <label class="col-sm-3 control-label">下次关怀时间</label>
                                <div class="col-sm-9">
                                  <input type="test" class="form-control" name="nexttime" value="<?php echo $res['nexttime'] ?>">
                             </div>
                            </div>
                         </td>
                     </tr>
                     <tr>
                         <td class="col-sm-6">
                             <div class="form-group" >
                                <label class="col-sm-3 control-label">关怀方式</label>
                                <div class="col-sm-9">
                                 <?php
                                    $host='192.168.12.238';
                                    $user='root';
                                    $pwd='123456';
                                    $db='crm';
                                    $pdo= new pdo("mysql:host=$host;dbname=$db",$user,$pwd);
                                    $arr=array();
                                    $sql="SELECT showway FROM cus_show";
                                    // echo $sql;
                                    foreach ($pdo -> query($sql) as $value) {
                                      $showway=$value['showway'];
                                      $arr[]=$showway;
                                    }
                                    echo "<select class='form-control' name='showway' >";
                                    foreach ($arr as $val) {
                                      echo "<option value='$val'>".$val."</option>";
                                    }
                                    echo " </select>";
                                  ?>
                             </div>
                            </div>
                         </td>
                         <td class="col-sm-6"></td>
                     </tr>
                     <tr >
                         <td colspan="2">
                             <div class="form-group" >
                                <label class="col-sm-2 control-label"  >&nbsp;&nbsp;&nbsp;备注</label>
                                <div class="col-sm-9">
                                  <textarea  cols="80" rows="4" name="note"><?php echo $res['note'] ?></textarea>
                             </div>
                            </div>
                         </td>
                     </tr>
                    </table>
                    <div style='margin-left:150px'>
                        <button type="sumbit" class="btn btn-primary">提交</button>
                        <input type="reset" class="btn btn-info">
                        <a href="cus_show.php"><button type="button" class="btn btn-default">返回</button></a>
                    </div>
            </td>
            </tr>

         </table>
      </form>
    </div>
<?php include 'footer.html'?>