<?php include 'header.html';
      include 'left.html';
?>
     <div style="margin:50px">
        <h2>客户状态</h2>
        <hr>
        <form method="post">
        <table class="table table-bordered" >
            <tr>
                <td class="active"><h4>添加客户状态</h4></td>
            </tr>
            <tr>
                <td>
                    <table style="margin:10px;width:100%;height:200px">
                     <tr>

                         <td class="col-sm-6">
                             <div class="form-group" >
                                <label class="col-xs-2 control-label">客户状态</label>
                                <div class="col-xs-8">
                                  <input type="text" class="form-control" name="status">
                                </div>
                                <div class="col-xs-2"></div>
                            </div>
                         </td>
                         </tr>
                         <tr>
                         <td class="col-sm-6">
                             <div class="form-group" >
                                <label class="col-xs-2 control-label">状态描述</label>
                                <div class="col-xs-8">
                                    <input type="text" class="form-control" name="cus_describe">
                                </div>
                                <div class="col-xs-2"></div>
                            </div>
                         </td>
                     </tr>
                    </table>
                    <div style='margin-left:150px'>
                        <button type="submit" formaction="index1.php?action=status_add" class="btn btn-primary">提交</button>

                    </div>
            </td>
            </tr>
         </table>
         </form>
    </div>
<?php include 'footer.html';?>