    <?php include_once __DIR__.DIRECTORY_SEPARATOR.'Common_header.php';?>
 <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <h2 class="col-sm-4">客户分配</h2>
            </div>
        </div>
  <div class="panel-body">
<form class="form-horizontal" action="action.php?act=customer_allot&step=allot"  method="post">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">客户姓名</label>
    <div class="col-sm-10">
        <input type="hidden" name="customer_id" value="<?php echo $id;?>" ;>
      <input type="text" class="form-control" name="customer_name"value="<?php echo $customer_info['customer_name'];?>" >
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">负责员工</label>
    <div class="col-sm-10">
     <select class="form-control" name="user_id">
     <?php foreach ($user_data as $value):?>
            <option value="<?php echo $value['user_id'];?>" >
              <?php echo $value['user_name'];?>
            </option>
     <?php endforeach;?>
    </select>
    <button type="submit" class="btn btn-primary" name="submit">提交  </button>
    </div>
</div>
</form>
</div>
    </div>



    </body>
</html>
