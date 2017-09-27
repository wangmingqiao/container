<?php include 'header.html';
      include 'left.html';
?>
        <div style="margin:50px">
            <h2>客户类型</h2>
            <hr />
            <form method="post">
            <table class="table table-bordered" >
                <tr>
                    <td style='background-color:#F0F0F0'>
                        <h4>添加客户类型</h4>
                    </td>
                </tr>
                <tr>
                    <td >
                    <div class="row">
                        <div class="col-xs-2">
                            <strong style="float:right;margin-top:8px">客户类型</strong>
                        </div>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" name="type">
                        </div>
                        <div class="col-xs-2"></div>
                    </div><br />
                    <div>
                        <div class="col-xs-2"></div>
                        <div class="col-xs-8"><button type="submit" formaction="index1.php?action=cus_type_add" class="btn btn-primary">提交</button></div>
                    </div>
                    </td>
                </tr>
            </table>
            </form>
        </div>
<?php include 'footer.html'?>