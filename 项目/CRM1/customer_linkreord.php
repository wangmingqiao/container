
<?php include 'header.php'?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">联系记录</h1>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-heading" style="height:50px;font-size:20px;">客户记录列表<a href="action.php?action=customer_linkreord&step=add"><input  type="button" class="btn btn-primary" value="添加" style="float:right;"/></a></div>
                </div>
                <div class="panel-body">
                    <!-- Table -->
                    <table class="table table-hover table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th>序号</th>
                                <th>客户</th>
                                <th>联系时间</th>
                                <th>联系人</th>
                                <th>联系类型</th>
                                <th>联系主题</th>
                                <th>下次联系时间</th>
                                <th>备注</th>
                                <th>基本操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($customer_linkreord_data as $info): ?>
                                <tr>
                                    <?php foreach ($info as $key=>$value): ?>
                                        <?php if ($key=='is_used') continue;?>
                                        <td><?php echo $value?></td>
                                    <?php endforeach; ?>
                                    <td>
                                        <a href="action.php?action=customer_linkreord&step=del&id=<?php echo $info['record_id']?>"><span class='glyphicon glyphicon-trash' aria-hidden='true'>删除</span></a>
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

