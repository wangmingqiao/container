<?php include_once __DIR__.DIRECTORY_SEPARATOR.'Common_header.php';?>
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <h2 class="col-sm-2">员工信息</h2>
            <a class="btn btn-info col-sm-offset-9" href="/action.php?act=user_info&step=add">添加</a>
        </div>
    </div>
    <div class="panel-body">
        <!-- Table -->
        <table class="table table-hover table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>姓名</th>
                <th>性别</th>
                <th>年龄</th>
                <th>邮箱</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <?php foreach ($user_data as $item):?>
            <tr>
                <?php foreach ($item as $value):?>
                    <td><?php echo $value;?></td>
                <?php endforeach; ?>
                <td>
                    <a href="/action.php?act=user_info&step=edit&id=<?php echo $item['user_id']?>">编辑</a>
                    <a href="/action.php?act=user_info&step=del&id=<?php echo $item['user_id']?>">删除</a>
                </td>
            </tr>
            <?php endforeach; ?>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="panel-footer">
        共有<?php echo $total_count;?>条记录，当前第<?php echo $page."/".$total_page;?>页
        <ul class="pager">
            <li><a href="<?php echo $first_page;?>">首页</a></li>
            <li><a href="<?php echo $pre_page?>">上一页</a></li>
            <li><a href="<?php echo $next_page?>">下一页</a></li>
            <li><a href="<?php echo $last_page?>">尾页</a></li>
        </ul>
    </div>

</div>
<?php include_once __DIR__.DIRECTORY_SEPARATOR.'Common_footer.php'?>