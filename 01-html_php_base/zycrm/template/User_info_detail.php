<?php include_once __DIR__.DIRECTORY_SEPARATOR.'Common_header.php'?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <h2 class="col-sm-4">添加员工信息</h2>
            </div>
        </div>
        <div class="panel-body">
            <!-- Table -->

            <form class="form-horizontal" method="post"
                  action="/action.php?act=user_info&step=<?php echo $is_edit?'edit':'add'?>">
                <?php  if ($is_edit):?>
                    <input type="hidden" value="<?php echo $id?>" name="user_id">
                <?php endif;?>

                <div class="row">
                    <div class="form-group col-xs-6">
                        <label class="col-sm-3 control-label form-label">员工姓名</label>
                        <div class="col-sm-8">
                            <input class="form-control" name=" user_name" type="text" value="<?php echo $is_edit?$info_data['user_name']:''; ?>">
                        </div>
                    </div>

                    <div class="form-group col-xs-6">
                        <label class="col-sm-3 control-label form-label">婚姻状态</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="is_married">
                                <?php foreach( $user_info as $value):?>
                                    <?php if($info_data['user_id']==$value['user_id']):?>
                                    <option value="<?php echo $value['is_married'];?>"selected><?php echo $value['is_married'];?></option>
                                        <?php else:?>
                                        <option value="<?php echo $value['is_married'];?>"><?php echo $value['is_married'];?></option>
                                        <?php endif;?>
                                <?php endforeach?>

                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-6">
                        <label class="col-sm-3 control-label form-label">员工年龄</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="user_age" value="<?php echo $is_edit?$info_data['user_age']:''; ?>">
                        </div>
                    </div>

                    <div class="form-group col-xs-6">
                        <label class="col-sm-3 control-label form-label">员工学历</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="user_diploma">
                                <?php foreach($user_info as $value):?>
                                <?php if($info_data['user_id']==$value['user_id']):?>
                                    <option value="<?php echo $value['user_diploma'];?>"selected><?php echo $value['user_diploma'];?></option>
                                <?php else:?>
                                    <option value="<?php echo $value['user_diploma'];?>"><?php echo $value['user_diploma'];?></option>
                                <?php endif;?>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-6">
                        <label class="col-sm-3 control-label form-label">员工性别</label>
                        <div class="col-sm-8">

                            <?php if($is_edit): ?>
                                <label class="radio-inline">
                                    <input type="radio" name="user_sex"  value="男" <?php if ($info_data['user_sex']=='男') echo 'checked'?> > 男
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="user_sex"  value="女" <?php if ($info_data['user_sex']=='女') echo 'checked'?> > 女
                                </label>
                            <?php else: ?>
                                <label class="radio-inline">
                                    <input type="radio" name="user_sex"  value="男" checked> 男
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="user_sex"  value="女"  > 女
                                </label>
                            <?php endif; ?>

                        </div>
                    </div>

                    <div class="form-group col-xs-6">
                        <label class="col-sm-3 control-label form-label">E-Mail</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="email" name="user_email" value="<?php echo $is_edit?$info_data['user_email']:''; ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-6">
                        <label class="col-sm-3 control-label form-label">添加时间</label>
                        <div class="col-sm-8">
                            <input class="form_datetime form-control" type="text" value="<?php echo $is_edit?$info_data['user_addtime']:''; ?>" name="user_addtime" readonly>
                        </div>
                    </div>

                    <div class="form-group col-xs-6">
                        <label class="col-sm-3 control-label form-label">民族</label>
                        <div class="col-sm-8">
                            <input class=" form-control" type="text" value="<?php echo $is_edit?$info_data['user_nation']:''; ?>" name="user_nation" >

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-6">
                        <label class="col-sm-3 control-label form-label">员工手机</label>
                        <div class="col-sm-8">
                            <input class="form-control" name="user_mobile" type="text" value="<?php echo $is_edit?$info_data['user_mobile']:''; ?>">
                        </div>
                    </div>

                    <div class="form-group col-xs-6">
                        <label class="col-sm-3 control-label form-label">员工电话</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="user_tel" value="<?php echo $is_edit?$info_data['user_tel']:''; ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-6">
                        <label class="col-sm-3 control-label form-label">员工地址</label>
                        <div class="col-sm-8">
                            <input class="form-control" name="user_address" type="text" value="<?php echo $is_edit?$info_data['user_address']:''; ?>">
                        </div>
                    </div>

                    <div class="form-group col-xs-6">
                        <label class="col-sm-3 control-label form-label">修改人</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="user_changeman" value="<?php echo $is_edit?$info_data['user_changeman']:''; ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-6">
                        <label class="col-sm-3 control-label form-label">创建人</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="user_addman" value="<?php echo $is_edit?$info_data['user_addman']:''; ?>">
                        </div>
                    </div>

                    <div class="form-group col-xs-6">
                        <label class="col-sm-3 control-label form-label">兴趣</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="user_interest" value="<?php echo $is_edit?$info_data['user_interest']:''; ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-6">
                        <label class="col-sm-3 control-label form-label">修改时间</label>
                        <div class="col-sm-8">
                            <input class="form_datetime form-control" type="text" name="user_changetime" value="<?php echo $is_edit?$info_data['user_changetime']:''; ?>"readonly>
                        </div>
                    </div>

                    <div class="form-group col-xs-6">
                        <label class="col-sm-3 control-label form-label">工号</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="user_idnum" value="<?php echo $is_edit?$info_data['user_idnum']:''; ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-6">
                        <label class="col-sm-3 control-label form-label">身份证号</label>
                        <div class="col-sm-8">
                            <input class="form-control" name="user_bankcard" type="text" value="<?php echo $is_edit?$info_data['user_bankcard']:''; ?>">
                        </div>
                    </div>

                    <div class="form-group col-xs-6">

                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-10">
                        <button class="btn btn-primary" type="submit" value="submit" name="submit">提交</button>
                        <button class="btn btn-info" type="reset">重置</button>
                        <a class="btn btn-default" onclick="history.back()" role="button">返回</a>
                    </div>
                </div>
            </form>

        </div><!--                body-->
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