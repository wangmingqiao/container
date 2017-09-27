<?php include 'header.html';
      include 'left.html';
?>
    <div style="margin:50px">
        <h2>添加关怀</h2>
        <hr>
        <form method="post">
         <table class="table table-bordered" >
            <tr>
              <td style='background-color:#F0F0F0'><h4>添加关怀信息</h4></td>
            </tr>
            <tr>
              <td>
                    <table style="margin:10px;width:100%;height:260px">
                     <tr>
                         <td class="col-sm-6">
                             <div class="form-group" >
                                <label class="col-sm-3 control-label">关怀主体</label>
                                <div class="col-sm-9">
                                  <input type="test" class="form-control" name="showtitle">
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
                                <label class="col-sm-3 control-label">下次关怀时间</label>
                                <div class="col-sm-9">
                                  <input type="test" class="form-control" name="nexttime">
                             </div>
                            </div>
                         </td>
                         <td class="col-sm-6">
                             <div class="form-group" >
                                <label class="col-sm-3 control-label">关怀方式</label>
                                <div class="col-sm-9">
                                  <select class="form-control" name="showway">
                                      <option>打电话</option>
                                      <option>聊QQ</option>
                                      <option>买羊肉串</option>
                                  </select>
                             </div>
                            </div>
                         </td>
                     </tr>
                     <tr  >
                         <td colspan="2">
                             <div class="form-group" >
                                <label class="col-sm-2 control-label" >&nbsp;&nbsp;&nbsp;备注</label>
                                <div class="col-sm-9">
                                  <textarea  cols="80" rows="4" name="note"></textarea>
                             </div>
                            </div>
                         </td>
                     </tr>
                    </table>
                    <div style='margin-left:150px'>
                        <button type="submit" formaction="index1.php?action=cus_show_add" class="btn btn-primary">提交</button>
                        <input type="reset" class="btn btn-info">
                        <a href="cus_show.php"><button type="button" class="btn btn-default">返回</button></a>
                    </div>
              </td>
            </tr>
         </table>
        </form>
    </div>
<?php include 'footer.html'?>


