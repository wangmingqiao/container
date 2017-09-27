
<?php include 'header.php'?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div style="margin:50px">
        <h2>客户分配</h2>
        <hr />
        <form method="post" action="action.php?action=customer_allot&step=allot">
            <table class="table table-bordered" >
                <tr>
                    <td style='background-color:#F0F0F0'>
                        <h4>客户分配</h4>
                    </td>
                </tr>
                <tr>
                    <td >
                        <div class="row">
                            <div class="col-xs-2">
                                <strong style="float:right;margin-top:8px">客户姓名</strong>
                            </div>
                            <div class="col-xs-8">
                                <input class="form-control"  type="text"
                                       value="<?php echo $allot_customer_name; ?>" readonly>
                                <input type="hidden" name="customer_id" value="<?php echo $id; ?>">
                            </div>
                            <div class="col-xs-2"></div>
                        </div><br />
                        <div class="row">
                            <div class="col-xs-2">
                                <strong style="float:right;margin-top:8px">负责员工</strong>
                            </div>
                            <div class="col-xs-8">
                                <select class="form-control" name="user_id">
                                    <?php foreach ($allot_user_data as $item):?>
                                        <option value="<?php echo $item['id'];?>">
                                            <?php echo $item['user_name'];?>
                                        </option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="col-xs-2"></div>
                        </div><br />
                        <div>
                            <div class="col-xs-2"></div>
                            <div class="col-xs-8"><button type="submit" class="btn btn-primary" name="submit" value="submit">提交</button></div>
                        </div>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php include 'footer.php'?>