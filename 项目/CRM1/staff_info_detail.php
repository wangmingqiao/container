<?php include 'header.php'?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">员工信息</h1>
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <h2 class="col-sm-4">添加员工信息</h2>
            </div>
        </div>
        <div class="panel-body">
            <!-- Table -->

            <form class="form-horizontal" method="post"
                  action="action.php?action=staff_info&step=<?php echo $is_edit?'edit':'add'?>">

                <?php  if ($is_edit):?>
                    <input type="hidden" value="<?php echo $id?>" name="user_id">
                <?php endif;?>

                <div class="row">
                    <div class="form-group col-xs-6">
                        <label class="col-sm-3 control-label form-label">员工姓名</label>
                        <div class="col-sm-8">
                            <input class="form-control" name="user_name" type="text" value="<?php echo $is_edit?$info_data['user_name']:''; ?>">
                        </div>
                    </div>

                    <div class="form-group col-xs-6">
                        <label class="col-sm-3 control-label form-label">员工权限</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="role_id">
                                <?php foreach ($role_data as $key=> $value):?>
                                    <?php if($is_edit&& ($key==$info_data['role_id'])):?>
                                        <option value="<?php echo $key;?>" selected>
                                            <?php echo $value;?>
                                        </option>
                                    <?php else: ?>
                                        <option value="<?php echo $key;?>">
                                            <?php echo $value;?>
                                        </option>
                                    <?php endif;?>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-6">
                        <label class="col-sm-3 control-label form-label">手机</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="user_mobile" value="<?php echo $is_edit?$info_data['user_mobile']:''; ?>">
                        </div>
                    </div>

                    <div class="form-group col-xs-6">
                        <label class="col-sm-3 control-label form-label">员工年龄</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="user_age" value="<?php echo $is_edit?$info_data['user_age']:''; ?>">
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
                        <label class="col-sm-3 control-label form-label">地址</label>
                        <div class="col-sm-8">
                            <input class="form_datetime form-control" type="text"  name="user_address" value="<?php echo $is_edit?$info_data['user_address']:''; ?>" name="customer_birthday" readonly>
                        </div>
                    </div>

                    <div class="form-group col-xs-6">
                        <label class="col-sm-3 control-label form-label">身份证号</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="user_idnum" value="<?php echo $is_edit?$info_data['user_idnum']:''; ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-6">
                        <label class="col-sm-3 control-label form-label">座机电话</label>
                        <div class="col-sm-8">
                            <input class="form-control" name="user_tel" type="text" value="<?php echo $is_edit?$info_data['user_tel']:''; ?>">
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
                        <label class="col-sm-3 control-label form-label">学历</label>
                        <div class="col-sm-8">
                            <input class="form-control" name="user_diploma" type="text" value="<?php echo $is_edit?$info_data['user_diploma']:''; ?>">
                        </div>
                    </div>

                    <div class="form-group col-xs-6">
                        <label class="col-sm-3 control-label form-label">修改人</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="user_changeman" value="<?php echo $_SESSION['user_name']; ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-6">
                        <label class="col-sm-3 control-label form-label">创建人</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="user_addman" value="<?php echo $is_edit?$info_data['user_addman']:$_SESSION['user_name']; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group col-xs-6">
                        <label class="col-sm-3 control-label form-label">民族</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="user_nation" value="<?php echo $is_edit?$info_data['user_nation']:''; ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-6">
                        <label class="col-sm-3 control-label form-label">银行卡号</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="user_bankcard" value="<?php echo $is_edit?$info_data['user_bankcard']:''; ?>">
                        </div>
                    </div>

                    <div class="form-group col-xs-6">
                        <label class="col-sm-3 control-label form-label">婚姻状况</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="is_married" value="<?php echo $is_edit?$info_data['is_married']:''; ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-6">
                        <label class="col-sm-3 control-label form-label">登录密码</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="user_pw" value="<?php echo $is_edit?$info_data['user_pw']:''; ?>">
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
    <?php include 'footer.php'?>
