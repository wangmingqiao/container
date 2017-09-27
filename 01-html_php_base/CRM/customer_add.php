<?php include 'header.html';
      include 'left.html';
?>
    <div style="margin:50px">
        <h2>添加客户</h2>
        <hr>
        <form method="post">
        <table class="table table-bordered" >
            <tr>
                <td style='background-color:#F0F0F0'><h4>添加客户信息</h4></td>
            </tr>
            <tr>
                <td>
                    <table style="margin:10px;width:100%;height:500px">
                     <tr>
                         <td class="col-sm-6">
                             <div class="form-group" >
                                <label class="col-sm-3 control-label">客户姓名</label>
                                <div class="col-sm-9">
                                  <input type="test" class="form-control" name="name">
                             </div>
                            </div>
                         </td>
                         <td class="col-sm-6">
                             <div class="form-group" >
                                <label class="col-sm-3 control-label">客户来源</label>
                                <div class="col-sm-9">
                                  <?php
                                    $host='192.168.12.238';
                                    $user='root';
                                    $pwd='123456';
                                    $db='crm';
                                    $pdo= new PDO("mysql:host=$host;dbname=$db",$user,$pwd);
                                    $arr = array();
                                    $sql="SELECT source FROM customer";
                                    foreach ($pdo -> query($sql) as $value) {
                                      $source = $value['source'];
                                      $arr[] = $source;
                                      }
                                      echo "<select class='form-control' name='source'>";
                                      foreach ($arr as $val) {
                                        echo "<option value='$val'>".$val."</option>";
                                        }
                                      echo "</select>";
                                  ?>
                             </div>
                            </div>
                         </td>
                     </tr>
                      <tr>
                         <td class="col-sm-6">
                             <div class="form-group" >
                                <label class="col-sm-3 control-label">客户职位</label>
                                <div class="col-sm-9">
                                  <input type="test" class="form-control" name="position">
                                </div>
                            </div>
                         </td>
                         <td class="col-sm-6">
                             <div class="form-group" >
                                <label class="col-sm-3 control-label">客户类别</label>
                                <div class="col-sm-9">
                                <?php
                                    $host='192.168.12.238';
                                    $user='root';
                                    $pwd='123456';
                                    $db='crm';
                                    $pdo= new PDO("mysql:host=$host;dbname=$db",$user,$pwd);
                                    $arr = array();
                                    $sql="SELECT type FROM customer";
                                    foreach ($pdo -> query($sql) as $value) {
                                      $type = $value['type'];
                                      $arr[] = $type;
                                      }
                                      echo "<select class='form-control' name='type'>";
                                      foreach ($arr as $val) {
                                        echo "<option value='$val'>".$val."</option>";
                                        }
                                      echo "</select>";
                                  ?>
                             </div>
                            </div>
                         </td>
                     </tr>
                      <tr>
                         <td class="col-sm-6">
                             <div class="form-group" >
                                <label class="col-sm-3 control-label">客户性别</label>
                                <div class="col-sm-9">
                                   <lable class="radio-inline">
                                      <input type="radio" name="sex" value="option1" />男&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      <input type="radio" name="sex" value="option1"/>女
                                   </lable>
                                </div>


                            </div>
                         </td>
                         <td class="col-sm-6">
                             <div class="form-group" >
                                <label class="col-sm-3 control-label">E-Mail</label>
                                <div class="col-sm-9">
                                   <input type="test" class="form-control" name="email">
                             </div>
                            </div>
                         </td>
                     </tr>
                      <tr>
                         <td class="col-sm-6">
                             <div class="form-group" >
                                <label class="col-sm-3 control-label">出生日期</label>
                                <div class="col-sm-9">
                                  <input type="test" class="form-control" name="birthday">
                                </div>
                              </div>
                         </td>
                         <td class="col-sm-6">
                             <div class="form-group" >
                                <label class="col-sm-3 control-label">客户状态</label>
                                <div class="col-sm-9">
                                  <?php
                                    $host='192.168.12.238';
                                    $user='root';
                                    $pwd='123456';
                                    $db='crm';
                                    $pdo= new PDO("mysql:host=$host;dbname=$db",$user,$pwd);
                                    $arr = array();
                                    $sql="SELECT status FROM customer";
                                    foreach ($pdo -> query($sql) as $value) {
                                      $status = $value['status'];
                                      $arr[] = $status;
                                      }
                                      echo "<select class='form-control' name='status'>";
                                      foreach ($arr as $val) {
                                        echo "<option value='$val'>".$val."</option>";
                                        }
                                      echo "</select>";
                                  ?>
                             </div>
                            </div>
                         </td>
                     </tr>

                     <tr>
                         <td class="col-sm-6">
                             <div class="form-group" >
                                <label class="col-sm-3 control-label">客户手机</label>
                                <div class="col-sm-9">
                                  <input type="test" class="form-control" name="tel">
                             </div>
                            </div>
                         </td>
                         <td class="col-sm-6">
                             <div class="form-group" >
                                <label class="col-sm-3 control-label">客户QQ</label>
                                <div class="col-sm-9">
                                  <input type="test" class="form-control" name="QQ">
                             </div>
                            </div>
                         </td>
                     </tr>
                      <tr>
                         <td class="col-sm-6">
                             <div class="form-group" >
                                <label class="col-sm-3 control-label">客户地址</label>
                                <div class="col-sm-9">
                                  <input type="test" class="form-control" name="adress">
                             </div>
                            </div>
                         </td>
                         <td class="col-sm-6">
                             <div class="form-group" >
                                <label class="col-sm-3 control-label">修改人</label>
                                <div class="col-sm-9">
                                  <input type="test" class="form-control" name="y_name">
                             </div>
                            </div>
                         </td>
                     </tr>
                      <tr>
                         <td class="col-sm-6">
                             <div class="form-group" >
                                <label class="col-sm-3 control-label">创建人</label>
                                <div class="col-sm-9">
                                  <input type="test" class="form-control" name="yname">
                             </div>
                            </div>
                         </td>
                         <td class="col-sm-6">
                             <div class="form-group" >
                                <label class="col-sm-3 control-label">客户微博</label>
                                <div class="col-sm-9">
                                  <input type="test" class="form-control" name="weibo">
                             </div>
                            </div>
                         </td>
                     </tr>
                      <tr>
                         <td class="col-sm-6">
                             <div class="form-group" >
                                <label class="col-sm-3 control-label">客户座机</label>
                                <div class="col-sm-9">
                                  <input type="test" class="form-control" name="phone">
                             </div>
                            </div>
                         </td>
                         <td class="col-sm-6">
                             <div class="form-group" >
                                <label class="col-sm-3 control-label">客户MSN</label>
                                <div class="col-sm-9">
                                  <input type="test" class="form-control" name="msn">
                             </div>
                            </div>
                         </td>
                     </tr>
                      <tr>
                         <td class="col-sm-6">
                             <div class="form-group" >
                                <label class="col-sm-3 control-label">客户公司</label>
                                <div class="col-sm-9">
                                  <input type="test" class="form-control" name="company">
                             </div>
                            </div>
                         </td>

                     </tr>


                     <tr >
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
                        <button type="submit" formaction="index1.php?action=cus_add" class="btn btn-primary">提交</button>
                        <input type="reset" class="btn btn-info">
                        <button type="button" class="btn btn-default" onclick="history.back()">返回</button>
                    </div>
            </td>
            </tr>
         </table>
         </form>
    </div>
<?php include 'footer.html'?>