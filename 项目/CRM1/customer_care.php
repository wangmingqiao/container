
<?php include 'header.php'?>
  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">客户关怀</h1>
    <div class="panel panel-default">
      <div class="panel-heading" style="height:50px;font-size:20px;">客户关怀列表<a href="action.php?action=customer_care&step=add"><input  type="button" class="btn btn-primary" value="添加" style="float:right;"/></a></div>
      <div class="panel-body">
        <table class="table table-hover table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>客户</th>
              <th>关怀主题</th>
              <th>关怀方式</th>
              <th>关怀时间</th>
              <th>下次关怀时间</th>
              <th>备注</th>
              <th>关怀人</th>
              <th>基本操作</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($care_data as $item):?>
                    <tr>
                        <?php foreach($item as $value):?>
                            <td><?php echo $value;?></td>
                        <?php endforeach;?>
                        <td>
                            <a href="action.php?action=customer_care&step=edit&id=<?php echo $item['care_id'];?>">编辑</a>/
                            <a href="action.php?action=customer_care&step=del&id=<?php echo $item['care_id'];?>">删除</a>
                        </td>
                    </tr>
                <?php endforeach;?>
          </tbody>
        </table>
      </div>
      <div class="panel-footer" style="height:50px;">

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
<?php include "footer.php"?>
