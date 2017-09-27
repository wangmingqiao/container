<?php include_once __DIR__.DIRECTORY_SEPARATOR.'Common_header.php'?>
<div class="panel panel-default">
    <div class="panel-heading">
    <div class="row">
            <h2 class="col-sm-2">客户分配</h2>
        </div>
        </div>
    <div class="panel-body">
        <!-- Table -->
        <table class="table table-hover table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>姓名</th>
                <th>状态</th>
                <th>来源</th>
                <th>类型</th>
                <th>创建时间</th>
                <th>公司</th>
                <th>备注</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($customer_data as  $value):?>
              <tr>
               <?php foreach ($value as $val): ?>
                   <td><?php echo $val;?></td>
               <?php endforeach ?>
               <td>
                <a href="action.php?act=customer_allot&step=allot&id=<?php echo $value['customer_id'];?>">分配</a>
               </td>
              </tr>
          <?php endforeach;?>
            </tbody>
        </table>
    </div>
    <div class="panel-footer">

        共有<?php echo $total_count?>条记录，当前第<?php echo $page.'/'.$total_page;?>页

            <ul class="pager">
                <li><a href="<?php echo $first_page?>">首页</a></li>
                <li><a href="<?php echo $pre_page?>">上一页</a></li>
                <li><a href="<?php echo $next_page?>">下一页</a></li>
                <li><a href="<?php echo $last_page?>">尾页</a></li>
            </ul>
    </div>

</div>
<?php include_once __DIR__.DIRECTORY_SEPARATOR.'Common_footer.php'?>
