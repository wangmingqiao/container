
<?php include_once __DIR__.DIRECTORY_SEPARATOR.'Common_header.php';?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <h2 class="col-sm-4">添加客户关怀</h2>
            </div>
        </div>
        <div class="panel-body">
            <!-- Table -->

            <form class="form-horizontal" method="post"
                  action="/action.php?act=customer_care&step=<?php echo $is_edit?'edit':'add'?>">

                <?php  if ($is_edit):?>
                <input type="hidden" value="<?php echo $id?>" name="care_id">
                <?php endif;?>

                <div class="row">
                    <div class="form-group col-xs-6">
                        <label class="col-sm-3 control-label form-label">关怀主题</label>
                        <div class="col-sm-8">
                            <input class="form-control" name="care_theme" type="text" value="<?php echo $is_edit?$care_info_data['care_theme']:'';?>">
                        </div>
                    </div>

                    <div class="form-group col-xs-6">
                        <label class="col-sm-3 control-label form-label">关怀对象</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="customer_id">
            <?php foreach ($care_obj_data as $value):?>
                 <?php if ($care_info_data['customer_id']==$value['id']): ?>
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
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-xs-6">
                        <label class="col-sm-3 control-label form-label">下次关怀时间</label>
                        <div class="col-sm-8">
                            <input class="form_datetime form-control" type="text" value="<?php echo $is_edit?$care_info_data['care_nexttime']:'';?>" name="care_nexttime" readonly>
                        </div>
                    </div>

                    <div class="form-group col-xs-6">
                        <label class="col-sm-3 control-label form-label">关怀方式</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="care_way">
                                <?php foreach ($care_way_data as $value):?>
                                    <?php if ($care_info_data['care_way']==$value): ?>
                                        <option value="<?php echo $value;?>" selected>
                                            <?php echo $value;?>
                                        </option>
                                    <?php else: ?>
                                          <option value="<?php echo $value;?>">
                                            <?php echo $value;?>
                                        </option>
                                    <?php endif ?>

                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-1 control-label form-label">备注</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="care_remark" rows="3"><?php echo $is_edit?$care_info_data['care_remark']:'';?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-10">
                        <button class="btn btn-primary" type="submit" value="submit" name="submit" value="submit">提交</button>
                        <button class="btn btn-info" type="reset">重置</button>
                        <a class="btn btn-default" onclick="history.back()" role="button">返回</a>
                    </div>
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