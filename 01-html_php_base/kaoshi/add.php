<?php include 'header.html'?>


        <form method="post">
        <table class="table table-bordered" >
            <tr>
                <td class="active"><h4>学生信息</h4></td>
            </tr>
            <tr>
                <td>
                    <table style="margin:10px;width:100%;height:260px">
                        <tr>
                             <td class="col-sm-6">
                                 <div class="form-group" >
                                    <label class="col-xs-2 control-label">姓名</label>
                                    <div class="col-xs-8">
                                        <input type="test" class="form-control" placeholder="姓名" name="name">
                                    </div>
                                    <div class="col-xs-2"></div>
                                </div>
                             </td>
                        </tr>
                        <tr>
                            <td class="col-sm-6">
                                <div class="form-group" >
                                    <label class="col-xs-2 control-label">性别</label>
                                    <div class="col-xs-8">
                                        <input type="test" class="form-control" placeholder="性别" name="sex">
                                    </div>
                                    <div class="col-xs-2"></div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                             <td class="col-sm-6">
                                 <div class="form-group" >
                                    <label class="col-xs-2 control-label">年龄</label>
                                    <div class="col-xs-8">
                                        <input type="test" class="form-control" placeholder="年龄" name="age">
                                    </div>
                                    <div class="col-xs-2"></div>
                                </div>
                             </td>
                        </tr>
                        <tr>
                             <td class="col-sm-6">
                                 <div class="form-group" >
                                    <label class="col-xs-2 control-label">班级</label>
                                    <div class="col-xs-8">
                                        <input type="test" class="form-control" placeholder="班级" name="class">
                                    </div>
                                    <div class="col-xs-2"></div>
                                </div>
                             </td>
                        </tr>
                        <tr>
                            <td><button type="submit" formaction="index1.php?action=submit" class="btn btn-info"  >添加</button><input type="submit" value="重置" class="btn btn-danger" style="margin-left:150px" /></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        </form>
<?php include 'footer.html'?>