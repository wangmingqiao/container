
<?php include 'header.php'?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h2 class="sub-header">主控板</h2>
            <div class="">
                <h4>欢迎你，<i> 销售经理 </i> - <b><?=$_SESSION['user_name']; ?></b> ， 现在是 <span id="getToday"></span> 。<br></h4>

                <script>
                    function displayTime() {
                        var date = new Date(); //日期对象
                        var now = "";
                        now = date.getFullYear() + " 年 ";
                        now = now + (date.getMonth() + 1) + " 月 ";
                        now = now + date.getDate() + " 日 ";
                        now = now + date.getHours() + " 时 ";
                        now = now + date.getMinutes() + " 分 ";
                        now = now + date.getSeconds() + " 秒 ";
                        $('#getToday').html(now);
                        setTimeout("displayTime()", 1000);
                    }
                    window.onload = displayTime;
                </script>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">关怀提醒</div>
                            <div class="panel-body">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>关怀主题</th>
                                        <th>关怀时间</th>
                                        <th>关怀对象</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($care_data as $item):?>
                                        <tr>
                                            <?php foreach($item as $value):?>
                                                <td><?php echo $value;?></td>
                                            <?php endforeach;?>
                                    <?php endforeach;?>
                                        </tr>

                                    </tbody>
                                </table>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">联系提醒</div>
                            <div class="panel-body">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>联系主题</th>
                                        <th>联系方式</th>
                                        <th>应联系时间</th>
                                        <th>联系对象</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($link_data as $item):?>
                                            <tr>
                                                <?php foreach($item as $value):?>
                                                    <td><?php echo $value;?></td>
                                                <?php endforeach;?>
                                                <?php endforeach;?>
                                            </tr>

                                    </tbody>
                                </table>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">公告提醒</div>
                            <div class="panel-body">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>公告主题</th>
                                        <th>公告内容</th>
                                        <th>截止时间</th>
                                        <th>公告人</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($notice_data as $item):?>
                                        <tr>
                                            <?php foreach($item as $value):?>
                                                <td><?php echo $value;?></td>
                                            <?php endforeach;?>
                                            <?php endforeach;?>
                                        </tr>

                                    </tbody>
                                </table>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">生日提醒</div>
                            <div class="panel-body">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>过生日的人</th>
                                        <th>生日时间</th>
                                        <th>手机号码</th>
                                        <th>客户状态</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($birthday_data as $item):?>
                                        <tr>
                                            <?php foreach($item as $value):?>
                                                <td><?php echo $value;?></td>
                                            <?php endforeach;?>
                                            <?php endforeach;?>
                                        </tr>

                                    </tbody>
                                </table>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
<?php include 'footer.php'?>

