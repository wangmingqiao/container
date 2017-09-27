<?php include 'header.html';
      include 'left.html';
?>
<?php
  $host='192.168.12.238';
  $user='root';
  $pwd='123456';
  $db='crm';
  $pdo= new pdo("mysql:host=$host;dbname=$db",$user,$pwd);
  $id=$_GET['id'];
  try {
        $sql="SELECT * FROM staff where y_id='$id'";
        foreach ($pdo->query($sql) as $row) {
        }
      } catch (Exception $e) {
        // Exception 异常
        echo $e->getMessage();
      }
?>
    <div style="margin:50px">
        <h2>修改客户</h2>
        <hr>
        <form  method="post">
        <table class="table table-bordered" >
            <tr>
              <td style='background-color:#F0F0F0'><h4>修改客户信息</h4></td>
            </tr>
            <tr>
              <td>
                <table style="margin:10px;width:100%;height:200px">
                  <tr>
                    <td class="col-sm-6">
                      <div class="form-group" >
                        <label class="col-sm-3 control-label">姓名</label>
                        <div class="col-sm-9">
                          <input type="test" class="form-control" name="y_name" value="<?php echo $row['y_name'];?>">
                        </div>
                      </div>
                    </td>
                    <td class="col-sm-6">
                      <div class="form-group" >
                        <div class="col-sm-9" style="margin-left:-13px">
                          <label class="col-sm-3 control-label">邮箱</label>
                          <div class="col-sm-9">
                            <input type="test" class="form-control" name="y_eamil" style="width:255px;margin-left:30px" value="<?php echo $row['y_eamil'];?>">
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="col-sm-6">
                      <div class="form-group" >
                        <label class="col-sm-3 control-label">年龄</label>
                          <div class="col-sm-9">
                            <input type="test" class="form-control" name="y_age" value="<?php echo $row['y_age'];?>">
                          </div>
                      </div>
                    </td>
                    <td class="col-sm-6">
                      <div class="form-group" >
                        <label class="col-sm-3 control-label">电话</label>
                          <div class="col-sm-9">
                            <input type="test" class="form-control" name="y_tel"  value="<?php echo $row['y_tel'];?>">
                          </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="col-sm-2">
                      <div class="form-group" >
                        <label class="col-sm-3 control-label">性别</label>
                            <lable class="radio-inline">
                              <input type="radio" name="y_sex" value="男" />男&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              <input type="radio" name="y_sex" value="女"/>女
                            </lable>
                      </div>
                    </td>
                  </tr>
                </table>
                <div style='margin-left:150px'>
                  <button type="submit" formaction="index1.php?action=staff_modi&id=<?php echo $id?>" class="btn btn-primary">提交</button>
                  <input type="reset" class="btn btn-info">
                  <a href="staff.php"><button type="button" class="btn btn-default">返回</button></a>
                </div>
              </td>
            </tr>
         </table>
         </form>
    </div>
<?php include 'footer.html'?>