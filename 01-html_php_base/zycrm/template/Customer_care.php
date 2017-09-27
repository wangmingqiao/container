<?php include_once __DIR__.DIRECTORY_SEPARATOR.'Common_header.php'?>
    <div class="panel panel-default">
      <div class="panel-heading">
    <div class="row">
            <h2 class="col-sm-2">客户关怀</h2>
            <a class="btn btn-info col-sm-offset-9" href="/action.php?act=customer_care&step=add">添加</a>
        </div>



        </div>
        <div class="panel-body">
            <!-- Table -->
            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>客户</th>
                    <th>关怀主体</th>
                    <th>关怀方式</th>
                    <th>关怀时间</th>
                    <th>下次关怀时间</th>
                    <th>备注</th>
                    <th>关怀人</th>
                    <th>操作</th>
                </tr
                </thead>
                <tbody>
             <?php foreach ($care_date as $item):?>
              <tr>
                   <?php foreach ($item as $value):?>
                   <td><?php echo $value;?></td>
               <?php endforeach;?>
               <td>
                   <a href="action.php?act=customer_care&step=edit&id=<?php echo $item['care_id']?>">编辑</a>
                  <a href="action.php?act=customer_care&step=del&id=<?php echo $item['care_id']?>">删除</a>
               </td>
              </tr>
              <?php endforeach;?>
                </tbody>
            </table>
        </div><!--                body-->
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