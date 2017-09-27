<?php include_once __DIR__.DIRECTORY_SEPARATOR.'Common_header.php'?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <h2 class="col-sm-4">添加客户信息</h2>
            </div>
        </div>
        <div class="panel-body">
            <!-- Table -->

            <form class="form-horizontal" method="post"
                  action="/action.php?act=customer_info&step=<?php echo $is_edit?'edit':'add'?>">

                <?php  if ($is_edit):?>
                    <input type="hidden" value="<?php echo $id?>" name="customer_id">
                <?php endif;?>

                <div class="row">
                    <div class="form-group col-xs-6">
                        <label class="col-sm-3 control-label form-label">客户姓名</label>
                        <div class="col-sm-8">
                            <input class="form-control" name="customer_name" type="text" value="<?php echo $is_edit?$info_data['customer_name']:''; ?>">
                        </div>
                    </div>

                    <div class="form-group col-xs-6">
                        <label class="col-sm-3 control-label form-label">客户来源</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="source_id">
                                <?php foreach ($sourc_data as $value):?>
                                    <?php if($is_edit&& ($value['id']==$info_data['source_id'])):?>
                                        <option value="<?php echo $value['id'];?>" selected>
                                            <?php echo $value['name'];?>
                                        </option>
                                    <?php else: ?>
                                        <option value="<?php echo $value['id'];?>">
                                            <?php echo $value['name'];?>
                                        </option>
                                    <?php endif;?>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-6">
                        <label class="col-sm-3 control-label form-label">客户职位</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="customer_job" value="<?php echo $is_edit?$info_data['customer_job']:''; ?>">
                        </div>
                    </div>

                    <div class="form-group col-xs-6">
                        <label class="col-sm-3 control-label form-label">客户类别</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="type_id">
                                <?php foreach ($types_data as $value):?>
                                    <?php if($is_edit&& ($value['id']==$info_data['type_id'])):?>
                                        <option value="<?php echo $value['id'];?>" selected>
                                            <?php echo $value['name'];?>
                                        </option>
                                    <?php else: ?>
                                        <option value="<?php echo $value['id'];?>">
                                            <?php echo $value['name'];?>
                                        </option>
                                    <?php endif;?>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-6">
                        <label class="col-sm-3 control-label form-label">客户性别</label>
                        <div class="col-sm-8">

                            <?php if($is_edit): ?>
                                <label class="radio-inline">
                                    <input type="radio" name="customer_sex"  value="男" <?php if ($info_data['customer_sex']=='男') echo 'checked'?> > 男
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="customer_sex"  value="女" <?php if ($info_data['customer_sex']=='女') echo 'checked'?> > 女
                                </label>
                            <?php else: ?>
                                <label class="radio-inline">
                                    <input type="radio" name="customer_sex"  value="男" checked> 男
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="customer_sex"  value="女"  > 女
                                </label>
                            <?php endif; ?>

                        </div>
                    </div>

                    <div class="form-group col-xs-6">
                        <label class="col-sm-3 control-label form-label">E-Mail</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="email" name="customer_email" value="<?php echo $is_edit?$info_data['customer_email']:''; ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-6">
                        <label class="col-sm-3 control-label form-label">出生日期</label>
                        <div class="col-sm-8">
                            <input class="form_datetime form-control" type="text" value="<?php echo $is_edit?$info_data['customer_birthday']:''; ?>" name="customer_birthday" readonly>
                        </div>
                    </div>

                    <div class="form-group col-xs-6">
                        <label class="col-sm-3 control-label form-label">客户状态</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="condition_id">
                                <?php foreach ($status_data as $value):?>
                                    <?php if($is_edit&& ($value['id']==$info_data['condition_id'])):?>
                                        <option value="<?php echo $value['id'];?>" selected>
                                            <?php echo $value['name'];?>
                                        </option>
                                    <?php else: ?>
                                        <option value="<?php echo $value['id'];?>">
                                            <?php echo $value['name'];?>
                                        </option>
                                    <?php endif;?>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-6">
                        <label class="col-sm-3 control-label form-label">客户手机</label>
                        <div class="col-sm-8">
                            <input class="form-control" name="customer_mobile" type="text" value="<?php echo $is_edit?$info_data['customer_mobile']:''; ?>">
                        </div>
                    </div>

                    <div class="form-group col-xs-6">
                        <label class="col-sm-3 control-label form-label">客户QQ</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="customer_qq" value="<?php echo $is_edit?$info_data['customer_qq']:''; ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-6">
                        <label class="col-sm-3 control-label form-label">客户地址</label>
                        <div class="col-sm-8">
                            <input class="form-control" name="customer_address" type="text" value="<?php echo $is_edit?$info_data['customer_address']:''; ?>">
                        </div>
                    </div>

                    <div class="form-group col-xs-6">
                        <label class="col-sm-3 control-label form-label">修改人</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="customer_changeman" value="<?php echo $is_edit?$info_data['customer_changeman']:''; ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-6">
                        <label class="col-sm-3 control-label form-label">创建人</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="customer_addman" value="<?php echo $is_edit?$info_data['customer_addman']:''; ?>">
                        </div>
                    </div>

                    <div class="form-group col-xs-6">
                        <label class="col-sm-3 control-label form-label">客户微博</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="customer_blog" value="<?php echo $is_edit?$info_data['customer_blog']:''; ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-6">
                        <label class="col-sm-3 control-label form-label">客户座机</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="customer_tel" value="<?php echo $is_edit?$info_data['customer_tel']:''; ?>">
                        </div>
                    </div>

                    <div class="form-group col-xs-6">
                        <label class="col-sm-3 control-label form-label">客户MSN</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="customer_msn" value="<?php echo $is_edit?$info_data['customer_msn']:''; ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-6">
                        <label class="col-sm-3 control-label form-label">客户公司</label>
                        <div class="col-sm-8">
                            <input class="form-control" name="customer_company" type="text" value="<?php echo $is_edit?$info_data['customer_company']:''; ?>">
                        </div>
                    </div>

                    <div class="form-group col-xs-6">

                    </div>
                </div>



                <div class="form-group">
                    <label class="col-sm-1 control-label form-label">备注</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="customer_remark" rows="3"><?php echo $is_edit?$info_data['customer_remark']:''; ?></textarea>
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