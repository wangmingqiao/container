 <?php include_once __DIR__.DIRECTORY_SEPARATOR.'Common_header.php';?>
 <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <h2 class="col-sm-4">客户状态</h2>
            </div>
        </div>
  <div class="panel-body">
<form class="form-horizontal" action="action.php?act=Customer_status&step=add"  method="post">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">客户状态</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="condition_name" >
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label ">状态描述</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="condition_explain" ><br />
    <button type="submit" class="btn btn-primary" name="submit">提交 </button>
    </div>
</div>
</form>
</div>
    </div>
    </body>
</html>

