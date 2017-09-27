 <?php include_once __DIR__.DIRECTORY_SEPARATOR.'Common_header.php';?>
 <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <h2 class="col-sm-4">添加联系</h2>
            </div>
        </div>
  <div class="panel-body">

    <div class="row">
    <div class="col-md-6">

      <form action="action.php?act=customer_linkrecord&step=<?php echo $is_edit?'edit':'add'?> " method="post">
          <?php  if ($is_edit):?>
              <input type="hidden" value="<?php echo $id?>" name="record_id">
          <?php endif;?>
       <div class="form-group">
      <label for="exampleInputName2">联系主题</label>
       <input type="text" class="form-control" name="link_theme" value="<?php echo $is_edit?$c_link_info['link_theme']:''; ?>">
  </div>

    <div class="form-group">
  <label for="exampleInputName2">下次联系时间</label>
    <input type="text" class="form_datetime form-control" name="link_nexttime" value="<?php echo $is_edit?$c_link_info['link_nexttime']:'';?>">
  </div>
    </div>

    <div class="col-md-6"><div class="form-group">
    <label for="exampleInputName2">联系对象</label>

    <select class="form-control" name="customer_id">
        <?php foreach ($c_link_obj as $value):?>
            <?php if ($c_link_info['customer_id']==$value['id']): ?>
                <option value="<?php echo $value['id'];?>" selected>
                    <?php echo $value['name'];?>
                </option>
            <?php else: ?>
                <option value="<?php echo $value['id'];?>">
                    <?php echo $value['name'];?>
                </option>
            <?php endif ?>

        <?php endforeach;?>
</select>
  </div>
  <div class="form-group">
    <label for="exampleInputName2">联系方式</label>
    <input type="text" class="form-control" name="link_type" value="<?php echo $is_edit?$c_link_info['link_type']:'';?>">
  </div>
  </div>
    <div class="form-group">
  <label for="exampleInputName2">备注</label>
  <textarea class="form-control" rows="3" name="link_remark">
  <?php echo $is_edit?$c_link_info['link_remark']:'';?>
  </textarea>
  </div>
 <button class="btn btn-primary" type="submit" value="submit" name="submit">提交</button>
  <button class="btn btn-info" type="reset">重置</button>
    <a class="btn btn-default" onclick="history.back()" role="button">返回</a>
</div>
</form>
</div>
 <link rel="stylesheet" href="/static/css/bootstrap-datetimepicker.min.css">
    <script src="/static/js/bootstrap-datetimepicker.js"></script>
    <script src="/static/js/bootstrap-datetimepicker.zh-CN.js"></script>
    <script type="text/javascript">
        $(".form_datetime").datetimepicker({
            format: "yyyy-mm-dd hh:mm",
            autoclose: true,
            todayBtn: true,
            todayHighlight: true,
            showMeridian: true,
            pickerPosition: "bottom-left",
            language: 'zh-CN', //中文，需要引用zh-CN.js包
            startView: 2, //月视图
            minView: 1//日期时间选择器所能够提供的最精确的时间选择视图
        });
    </script>


<?php include_once __DIR__.DIRECTORY_SEPARATOR.'Common_footer.php'?>
