
<?php include_once __DIR__.DIRECTORY_SEPARATOR.'Common_header.php';?>
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <h2 class="col-sm-4">添加公告</h2>
        </div>
    </div>
    <div class="panel-body">
        <!-- Table -->

        <form class="form-horizontal" method="post"
              action="/action.php?act=notic&step=<?php echo $is_edit?'edit':'add'?>">

            <?php  if ($is_edit):?>
                <input type="hidden" value="<?php echo $id?>" name="notice_id">
            <?php endif;?>

            <div class="row">
                <div class="form-group col-xs-6">
                    <label class="col-sm-3 control-label form-label">公告主题</label>
                    <div class="col-sm-8">
                        <input class="form-control" name="notice_title" type="text" value="<?php echo $is_edit?$notice_data['notice_title']:'';?>">
                    </div>
                </div>

                <div class="form-group col-xs-6">
                    <label class="col-sm-3 control-label form-label">公告人</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="user_id">
                            <?php foreach ($user_data as $value):?>
                                <?php if ($notice_data['user_id']==$value['user_id']): ?>
                                    <option value="<?php echo $value['user_id'];?>" selected>
                                        <?php echo $value['user_name'];?>
                                    </option>
                                <?php else: ?>
                                    <option value="<?php echo $value['user_id'];?>">
                                        <?php echo $value['user_name'];?>
                                    </option>
                                <?php endif ?>
                            <?php endforeach;?>
                     </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label form-label">公告内容</label>
                <div class="col-sm-9">
                    <textarea class="form-control" name="notice_content" rows="3"><?php echo       $is_edit?$notice_data['notice_content']:'';?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-xs-6">
                    <label class="col-sm-3 control-label form-label">下次公告时间</label>
                    <div class="col-sm-8">
                        <input class="form_datetime form-control" type="text" value="<?php echo $is_edit?$notice_data['notice_endtime']:'';?>" name="notice_endtime" readonly>
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