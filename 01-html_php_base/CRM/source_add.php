<?php include 'header.html';
      include 'left.html';
?>
    <body>
    <div style="margin:50px">
        <h2>客户来源</h2>
        <hr>
        <form method="post">
        <table class="table table-bordered" >
            <tr>
                <td class="active"><h4>添加客户</h4></td>
            </tr>
            <tr>
                <td>
                    <table style="margin:10px;width:100%;height:260px">
                     <tr>
                         <td class="col-sm-6">
                             <div class="form-group" >
                                <label class="col-xs-2 control-label">客户类型</label>
                                <div class="col-xs-8">
                                    <input type="test" class="form-control" name="type">
                                </div>
                                <div class="col-xs-2"></div>
                            </div>
                         </td>
                     </tr>
                     <td class="col-sm-6">
                             <div class="form-group" >
                                <label class="col-xs-2 control-label">客户来源</label>
                                <div class="col-xs-8">
                                    <input type="test" class="form-control" name="source">
                                </div>
                                <div class="col-xs-2"></div>
                            </div>
                         </td>
                     <tr>
                       <td>
                         <input type="submit" formaction="index1.php?action=source_add" value="提交" class="btn btn-primary" style="margin-left:150px" />
                       </td>
                     </tr>
                    </table>
                </td>
            </tr>
        </table>
        </form>
    </div>
<?php include 'footer.html'?>