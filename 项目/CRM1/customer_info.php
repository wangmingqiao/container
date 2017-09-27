
<?php include 'header.php'?>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">客户信息</h1>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-heading" style="height:50px;font-size:20px;">客户信息列表<a href="action.php?action=customer_info&step=add"><input  type="button" class="btn btn-primary" value="添加" style="float:right;"/></a></div>
            </div>
            <div class="panel-body">
                <!-- Table -->
                <table class="table table-hover table-bordered table-condensed">
                    <thead>
                    <tr>
                        <th>姓名</th>
                        <th>状态</th>
                        <th>来源</th>
                        <th>所属</th>
                        <th>类型</th>
                        <th>性别</th>
                        <th>手机</th>
                        <th>QQ</th>
                        <th>邮箱</th>
                        <th>职位</th>
                        <th>公司</th>
                        <th>备注</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($data as $info): ?>
                    <tr>
                        <?php foreach ($info as $key=>$value): ?>
                            <?php if ($key=='id') continue;?>
                            <td><?php echo $value?></td>
                        <?php endforeach; ?>
                        <td>
                            <a href="action.php?action=customer_info&step=edit&id=<?php echo $info['id']?>">编辑</a>/
                            <a href="action.php?action=customer_info&step=del&id=<?php echo $info['id']?>">删除</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>

                    </tbody>
                </table>
            </div><!--                body-->
            <div class="panel-footer" style="height:50px">
            共有<?php echo $total_count;?>条记录，当前第<?php echo $page;?>/<?php echo $total_page;?>页
            <ul class="pager" style="float:right;margin-top:-2px">
                <li><a href="<?php echo $first_page;?>">首页</a></li>
                <li><a href="<?php echo $pre_page;?>">上一页</a></li>
                <li><a href="<?php echo $next_page;?>">下一页</a></li>
                <li><a href="<?php echo $last_page;?>">尾页</a></li>
            </ul>
        </div>
        </div>
    </div>
<?php include 'footer.php'?>
