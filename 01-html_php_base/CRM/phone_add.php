<?php include 'header.html';
      include 'left.html';
?>
<div style="margin:50px">
        <h2>添加联系</h2>
        <hr>
        <form method="post">
        <table class="table table-bordered" >
            <tr>
                <td class="active"><h4>添加联系记录</h4></td>
            </tr>
            <tr>
                <td>
                    <table style="margin:10px;width:100%;height:260px">
                     <tr>
                         <td class="col-sm-6">
                             <div class="form-group" >
                                <label class="col-sm-3 control-label">联系主题</label>
                                <div class="col-sm-9">
                                  <input type="test" class="form-control" name="c_title">
                             </div>
                            </div>
                         </td>
                         <td class="col-sm-6">
                             <div class="form-group" >
                                <label class="col-sm-3 control-label">联系对象</label>
                                <div class="col-sm-9">
                                  <select class="form-control" name="name">
                                      <option>刘欢</option>
                                      <option>阿凡提</option>
                                      <option>华纳</option>
                                  </select>
                             </div>
                            </div>
                         </td>
                     </tr>
                     <tr>
                         <td class="col-sm-6">
                             <div class="form-group" >
                                <label class="col-sm-3 control-label">下次联系时间</label>
                                <div class="col-sm-9">
                                  <input type="test" class="form-control" name="next_ctime">
                             </div>
                            </div>
                         </td>
                         <td class="col-sm-6">
                             <div class="form-group" >
                                <label class="col-sm-3 control-label">联系方式</label>
                                <div class="col-sm-9">
                                  <select class="form-control" name="c_type">
                                      <option>手机</option>
                                      <option>上门拜访</option>
                                      <option>手机</option>
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
                                  <textarea  cols="80" rows="4" name="c_note"></textarea>
                             </div>
                            </div>
                         </td>
                     </tr>
                    </table>
                    <div style='margin-left:150px'>
                        <button type="submit" formaction="index1.php?action=phone_add" class="btn btn-primary">提交</button>
                        <input type="reset" href="phone-add.html" class="btn btn-info">
                       <a href="phone.php" class="btn btn-default">返回</a>
                    </div>
            </td>
            </tr>
         </table>
         </form>
    </div>
<?php include 'footer.html'?>