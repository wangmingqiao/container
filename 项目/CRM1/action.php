<?php
/**
 * @Author: WMQ
 * @Date:   2017-08-29 15:55:41
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-09-12 13:59:59
 */
include 'DB.php';
include 'common.php';
if (isset($_GET['action'])) {
    $_GET['action']();
}
function home(){
    $sql="SELECT customer_name,date_format(customer_birthday,'%c-%d') AS birthday,customer_mobile FROM customer_info WHERE date_format(customer_birthday,'%c-%d') BETWEEN date_format(curdate(),'%c-%d') AND date_format(curdate()+3,'%c-%d')";
    $birthday_data=db_query($sql);
    $sql="SELECT care_theme,care_nexttime,info.customer_name FROM customer_care as care,customer_info as info where care.is_used=1 and care.customer_id=info.customer_id order by care_id desc limit 3";
    $care_data=db_query($sql);
    $sql="SELECT link_theme,link_type,link_nexttime,info.customer_name from customer_linkreord as link,customer_info as info where link.is_used=1 and link.customer_id=info.customer_id order by record_id desc limit 3";
    $link_data=db_query($sql);
    $sql="SELECT notice_title,user.user_name,notice_time,notice_content from notice_info as notice,user_info as user where notice.is_used=1 and notice.user_id=user.user_id order by notice_id desc limit 3";
    $notice_data=db_query($sql);
    include 'home.php';
}
function customer_info(){

    //客户信息首页
    if (!isset($_GET['step'])){

        //分页数据处理
        //获得当前页数,没传表示第1页
        $page = @intval($_GET['page']) ? : 1;

        //分页处理
        //总的条数
        $numbers = db_query('SELECT count(customer_id) as count FROM customer_info WHERE is_used=1');
        $total_count = $numbers[0]['count'];

        //每页的个数
        $page_limit = 5 ;

        //分页配置-动作+总数+每页数+当前页
        extract(page_option("customer_info",$total_count,$page_limit,$page));


        //获取数据
        $data = db_query("SELECT customer_id AS id , customer_name,condition_name,source_name,user_name,type_name,customer_sex,customer_mobile,customer_qq,customer_email,customer_job,customer_company,customer_remark FROM customer_info  LEFT JOIN customer_condition ON customer_info.condition_id = customer_condition.condition_id LEFT JOIN customer_source ON customer_info.source_id = customer_source.source_id LEFT JOIN customer_type ON customer_info.type_id=customer_type.type_id LEFT JOIN user_info ON customer_info.user_id =user_info.user_id WHERE customer_info.is_used=1 ORDER BY customer_id DESC LIMIT $begin_num , $page_limit ;");
        //显示数据
        include 'customer_info.php';
    }else{
        //客户信息相关功能
        $step = $_GET['step'];
        switch ($step) {
            //添加
            case 'add':

                if (!isset($_POST['submit'])){
                    //添加客户首页
                    $is_edit = false;
                    //获得客户来源
                    $sourc_data = db_query("SELECT source_id AS id ,source_name AS name from customer_source WHERE is_used=1");
                    //获得客户状态
                    $status_data = db_query("SELECT condition_id AS id,condition_name AS name from customer_condition WHERE is_used=1");
                    //获得客户类别
                    $types_data = db_query("SELECT type_id AS id,type_name AS name from customer_type WHERE is_used=1");
                    include 'customer_info_detail.php';
                }else{

                    //添加客户操作
                    $keys = $values = null;

                    //数据拼接
                    foreach ($_POST as $key => $value){
                        if ($key =='submit'){
                            continue;
                        }
                        $keys .= $key.',';

                        if (strlen($value)>0){
                            $values .= "'$value'".',';
                        }else{
                            $values .= 'null,';
                        }

                    }
                    $keys = rtrim($keys,',');
                    $values = rtrim($values,',');

                    $sql = "INSERT INTO customer_info ($keys) VALUES ($values)";
                    if(db_exec($sql)){
                        jump('插入成功,1秒后自动跳转...','action.php?action=customer_info');
                    }else{
                        error_option("action.php?action=customer_info&step=add");
                    }
                }

                break;
            //编辑
            case 'edit':
                if(!isset($_POST['submit'])){
                    //编辑显示
                    if (isset($_GET['id'])){
                        //获得个人数据
                        $id = $_GET['id'];
                        $info_data = db_query("SELECT * FROM customer_info WHERE customer_id=$id");

                        $info_data = $info_data[0];

                        $is_edit = true;

                        //获得客户来源
                        $sourc_data = db_query("SELECT source_id AS id ,source_name AS name from customer_source WHERE is_used=1");
                        //获得客户状态
                        $status_data = db_query("SELECT condition_id AS id,condition_name AS name from customer_condition WHERE is_used=1");
                        //获得客户类别
                        $types_data = db_query("SELECT type_id AS id,type_name AS name from customer_type WHERE is_used=1");
                        //显示数据
                        include 'customer_info_detail.php';

                    }else{
                        error_option("action.php?action=customer_info");
                    }
                }else{
                    //编辑操作
                    if (isset($_POST['customer_id'])){
                        $id = $_POST['customer_id'];
                        $update_sql = null;
                        foreach ($_POST as $key => $value){

                            if ($key=='submit'||$key=='customer_id')continue;

                            $update_sql .= $key.'='."'".$value."',";
                        }
                        $update_sql = rtrim($update_sql,',');
                        $sql = "UPDATE customer_info SET $update_sql WHERE customer_id=$id";
                        if (db_exec($sql)){
                            jump('编辑成功,1秒后自动跳转...','action.php?action=customer_info');
                        }else{
                            error_option("action.php?action=customer_info");
                        }
                    }else{
                        error_option("action.php?action=customer_info");
                    }
                }
                break;
            //删除
            case 'del':

                if (isset($_GET['id'])){
                    $id = $_GET['id'];
                    if (db_exec("UPDATE customer_info SET is_used=0 WHERE customer_id=$id")){
                        jump('删除成功,1秒后自动跳转...','action.php?action=customer_info');
                    }else{
                        error_option("action.php?action=customer_info");
                    }
                }else{
                    error_option("action.php?action=customer_info");
                }

                break;
            default:
                break;
        }
    }
}
function customer_allot(){
    if (!isset($_GET['step'])){
        $page=@intval($_GET['page'])?:1;
        $res=db_query("SELECT count(customer_id) as count from customer_info WHERE user_id IS NULL AND  customer_info.is_used=1");
        $total_count=$res[0]['count'];
        $page_limit=4;
        extract(page_option("customer_allot",$total_count,$page_limit,$page));
        $sql=("SELECT customer_id,customer_name,condition_name,source_name,type_name,customer_addtime,customer_company,customer_remark from customer_info INNER join customer_source INNER JOIN  customer_type INNER join customer_condition ON customer_info.condition_id=customer_condition.condition_id AND customer_info.source_id=customer_source.source_id AND customer_info.type_id=customer_type.type_id where customer_info.is_used=1 AND user_id is NULL");
        $customer_allot_data=db_query($sql);
        //    print_r($customer_allot_data);
        include 'customer_allot.php';
    }else{
        if (!isset($_POST['submit'])){
            $id=$_GET['id'];
            $allot_customer_name=db_query("select customer_name from customer_info WHERE  customer_id={$id}")[0]['customer_name'];
            $allot_user_data=db_query("select user_name,user_id as id from user_info WHERE is_used=1");
            print_r($allot_customer_name);
            include 'customer_allot_detail.php';
        }else{
            $step=$_GET['step'];
            if ($step=='allot'){
                $user_id = $_POST['user_id'];
                $customer_id = $_POST['customer_id'];
                if (db_exec("UPDATE customer_info set user_id={$user_id} WHERE customer_id={$customer_id}")){
                    jump('分配成功，1秒后将自动跳转...','action.php?action=customer_allot');
                }else{
                    error_option('/action.php?action=customer_allot');
                }
            }
        }

    }

}
function customer_care(){
    if (!isset($_GET['step'])) {
        //单纯的页面展示
        //分页功能-根据数据库的数据做分页功能
        //总条数
        $res=db_query("SELECT count(care_id) as count from customer_care where is_used=1");

        $total_count=$res[0]['count'];

        //每页条数
        $page_limit=4;
        //当前页数
        $page=@intval($_GET['page'])?:1;
        //将数组中的元素之间写入到参数表中
        extract(page_option('customer_care',$total_count,$page_limit,$page));
        //当前的页数
        //显示数据-数据库获取数据
        $sql="SELECT care_id,customer_name,care_theme,care_way,care_time,care_nexttime,care_remark,care_people from customer_care INNER JOIN customer_info ON customer_care.customer_id=customer_info.customer_id where customer_care.is_used=1 ORDER BY customer_care.care_id DESC limit {$begin_num},{$page_limit}";
        $care_data=db_query($sql);
        include 'customer_care.php';
    }else{
        //功能操作
        $step=$_GET['step'];
        switch ($step) {
            case 'add':
                if (!isset($_POST['submit'])) {
                    //进入添加关怀界面
                    $is_edit=false;
                    @session_start();
                    //从session中获得user_id
                    $user_id=$_SESSION['user_id'];
                    //关怀对象
                    $care_obj_data=db_query("SELECT customer_id as id,customer_name as name from customer_info where is_used=1 and user_id={$user_id}");
                    //关怀方式
                    $care_way_data=array('送礼品卡','打电话问候','请客吃饭','一起开黑','上门拜访','发短信');
                    include'customer_care_detail.php';
                }else{
                    $keys=$values=null;
                    foreach ($_POST as $key => $value) {
                        if ($key=='submit') continue;
                        $keys.=$key.',';
                        $values.="'{$value}',";
                    }
                    $keys=rtrim($keys,',');
                    $values=rtrim($values,',');
                    session_start();
                    //从session中获得user_name
                    $user_name=$_SESSION['user_name'];
                    $sql="INSERT INTO customer_care ({$keys},care_time,care_people) value ({$values},now(),'{$user_name}')";
                    if (db_exec($sql)) {
                        jump('插入成功,1秒后自动跳转...','action.php?action=customer_care');
                    }else{
                        error_option('action.php?action=customer_care&step=add');
                    }
                }

                break;
            case 'edit':
                //显示编辑页面
                if (!isset($_POST['submit'])) {
                    //显示编辑页面
                    $id=$_GET['id'];
                    //通过id获取单条数据
                    $care_info_data=db_query("SELECT * from customer_care where care_id={$id}")[0];
                    //进入添加关怀界面
                    $is_edit=true;
                    session_start();
                    //从session中获得user_id
                    $user_id=$_SESSION['user_id'];
                    //关怀对象
                    $care_obj_data=db_query("SELECT customer_id as id,customer_name as name from customer_info where is_used=1 and user_id={$user_id}");
                    //关怀方式
                    $care_way_data=array('送礼品卡','打电话问候','请客吃饭','一起开黑','上门拜访','发短信');
                    //加载模板
                    include 'customer_care_detail.php';
                }else{
                    //编辑提交
                    $keys=$values=null;
                    $update_sql=null;
                    foreach ($_POST as $key => $value) {
                        if ($key=='submit') continue;
                        $update_sql.="{$key}='{$value}',";
                    }
                    $update_sql=rtrim($update_sql,',');

                    $id=$_POST['care_id'];

                    $sql="UPDATE customer_care set {$update_sql},care_time=now() where care_id={$id}";
                    if (db_exec($sql)) {
                        jump('更新成功,1秒后自动跳转...','action.php?action=customer_care');
                    }else{
                        error_option("action.php?action=customer_care&step=edit&id={$id}");
                    }
                }
                break;
            case 'del':
                $id=$_GET['id'];
                if (db_exec("UPDATE customer_care set is_used=0 where care_id={$id}")) {
                    jump('删除成功,1秒后自动跳转...','action.php?action=customer_care');
                }else{
                    error_option("action.php?action=customer_care");
                }
                break;
            default:

                break;
        }
    }
}
function customer_type(){
    if (!isset($_GET['step']) ){
        $res=db_query("SELECT count(type_id) as count from customer_type where is_used=1")[0];
        $total_count=$res['count'];
        $page_limit=3;
        $page=@intval($_GET['page'])?:1;
        extract(page_option('customer_type',$total_count,$page_limit,$page));

        $sql=("SELECT * from customer_type where is_used=1 limit {$begin_num},{$page_limit}");
        $customer_type_data=db_query($sql);
        // print_r($customer_type_data);
        include 'customer_type.php';
    }else{
        $step=$_GET['step'];
        switch ($step) {
            case 'add':
                if (!isset($_POST['submit'])) {
                    include 'customer_type_detail.php';
                }else{
                    $keys=$values=null;
                    foreach ($_POST as $key => $value) {
                        if ($key=='submit') continue;
                            $keys.=$key.',';
                            $values.="'{$value}',";
                    }
                    $keys=rtrim($keys,',');
                    $values=rtrim($values,',');
                    if (db_exec("INSERT INTO customer_type ({$keys}) value ({$values})") ){
                        jump('插入成功,1秒后自动跳转...','action.php?action=customer_type');
                    }else{
                        error_option("action.php?action=customer_type&step=add");
                    }
                }

                break;
            case 'del':
                $id=$_GET['id'];
                if (db_exec("UPDATE customer_type set is_used=0 where type_id=$id")) {
                    jump('删除成功,1秒后自动跳转...','action.php?action=customer_type');
                }else{
                    error_option("action.php?action=customer_type");
                }
                break;
            default:

                break;
        }

    }

}
function customer_status(){
    if (!isset($_GET['step'])) {
        $page = @intval($_GET['page']) ? : 1;
        $res=db_query("SELECT count(condition_id) as count from customer_condition where is_used=1");
        $total_count=$res[0]['count'];
        $page_limit=4;
        extract(page_option('customer_status',$total_count,$page_limit,$page));
        $sql=("SELECT * from customer_condition where is_used limit {$begin_num},{$page_limit}");
        $customer_status_data=db_query($sql);
        // print_r($customer_status_data);
        include 'customer_status.php';
    }else{
        $step=$_GET['step'];
        switch ($step) {
            case 'add':
                if (!isset($_POST['submit'])) {
                    include 'customer_status_detail.php';
                }else{
                    $keys=$values=null;
                    foreach ($_POST as $key => $value) {
                        if ($key=='submit') continue;
                        $keys.=$key.',';
                        $values.="'{$value}',";
                    }
                    $keys=rtrim($keys,',');
                    $values=rtrim($values,',');
                    $res=db_exec("INSERT into customer_condition ({$keys}) value ({$values})");
                    if ($res) {
                        jump('插入成功,1秒后自动跳转...','action.php?action=customer_status');
                    }else{
                        error_option('action.php?action=customer_status&step=add');
                    }
                }
                break;
            case 'del':
                $id=$_GET['id'];
                if (db_exec("UPDATE customer_condition set is_used=0 where condition_id=$id")) {
                    jump('删除成功,1秒后自动跳转...','action.php?action=customer_status');
                }else{
                    error_option('action.php?action=customer_status');
                }
                break;
            default:

                break;
        }
    }

}
function customer_source(){
    if (!isset($_GET['step'])) {
        $page=@intval($_GET['page'])?:1;
        $sql=db_query("SELECT count(source_id) as count from customer_source where is_used=1");
        $total_count=$sql[0]['count'];
        $page_limit=4;
        extract(page_option('customer_source',$total_count,$page_limit,$page));
        $customer_source_data=db_query("SELECT * from customer_source where is_used=1 limit {$begin_num},{$page_limit}");
        // print_r($sql);
        include 'customer_source.php';
    }else{
        $step=$_GET['step'];
        switch ($step) {
            case 'add':
                if (!isset($_POST['submit'])) {
                    include 'customer_source_detail.php';
                }else{
                    $keys=$values=null;
                    foreach ($_POST as $key => $value) {
                        // print_r($_POST);
                        if ($key=='submit') continue;
                        $keys.=$key.',';
                        $values.="'{$value}',";
                    }
                    $keys=rtrim($keys,',');
                    $values=rtrim($values,',');
                    $sql=("INSERT into customer_source ({$keys}) value ({$values})");
                    if (db_exec($sql)) {
                        jump('插入成功,1秒后自动跳转...','action.php?action=customer_source');
                    }else{
                        error_option('action.php?action=customer_source&step=add');
                    }
                }
                break;
            case 'del':
                $id=$_GET['id'];
                if (db_exec("UPDATE customer_source set is_used=0 where source_id=$id")) {
                    jump('删除成功,1秒后自动跳转...','action.php?action=customer_source');
                }else{
                    error_option('action.php?action=customer_source');
                }
                break;
            default:

                break;
        }
    }

}
function customer_linkreord(){
    if (!isset($_GET['step'])) {
        $sql=db_query("SELECT count(record_id) as count from customer_linkreord where is_used=1");
        $page=@intval($_GET['page'])? :1;
        // print_r($sql);
        $total_count=$sql[0]['count'];
        $page_limit=4;
        extract(page_option('customer_linkreord',$total_count,$page_limit,$page));
        session_start();
        //从session中获得user_name
        $user_name=$_SESSION['user_name'];
        $customer_linkreord_data=db_query("SELECT record_id,customer_name,link_time,who_link,link_type,link_theme,link_nexttime,link_remark from customer_linkreord inner join customer_info on customer_linkreord.customer_id=customer_info.customer_id where customer_linkreord.is_used=1 and who_link='{$user_name}' order by record_id limit {$begin_num},{$page_limit}");
        // print_r($customer_linkreord_data);
        include 'customer_linkreord.php';
    }else{
        $step=$_GET['step'];
        switch ($step) {
            case 'add':
                if (!isset($_POST['submit'])) {
                    session_start();
                    //从session中获得user_name
                    $user_name=$_SESSION['user_name'];
                    $link_obj_data=db_query("SELECT customer_name as name ,customer_id as id from customer_info ");
                    $link_type_data=array('打电话','面谈','发短信');
                    include'customer_linkreord_detail.php';
                }else{
                    $keys=$values=null;
                    foreach ($_POST as $key => $value) {
                        // print_r($_POST);
                        if ($key=='submit') continue;
                        $keys.=$key.',';
                        $values.="'{$value}',";
                    }
                    $keys=rtrim($keys,',');
                    $values=rtrim($values,',');
                    // echo $keys;
                    session_start();
                    //从session中获得user_name
                    $user_name=$_SESSION['user_name'];
                    if (db_exec("INSERT into customer_linkreord ({$keys},who_link) value ({$values},'{$user_name}')")) {
                        jump('插入成功,1秒后自动跳转...','action.php?action=customer_linkreord');
                    }else{
                        error_option('action.php?action=customer_linkreord&step=add');
                    }
                }
                break;
            case 'del':
                $id=$_GET['id'];
                if (db_exec("UPDATE customer_linkreord set is_used=0 where record_id={$id}")) {
                    jump('删除成功,1秒后自动跳转...','action.php?action=customer_linkreord');
                }else{
                    error_option("action.php?action=customer_linkreord");
                }
                break;
            default:

                break;
        }
    }
}
function staff_info(){
    if (!isset($_GET['step'])) {
        $res = db_query("select count(user_id) as count from user_info WHERE is_used=1");
        $page = @intval($_GET['page']) ?: 1;
        $total_count = $res[0]['count'];
        $page_limit = 4;
        extract(page_option('staff_info', $total_count, $page_limit, $page));
        $sql = ("SELECT user_id,user_name,user_sex,user_age,user_tel,user_email from user_info WHERE  is_used=1 limit {$begin_num},{$page_limit}");
        $user_data = db_query($sql);
        include 'staff_info.php';
    } else {
        //客户信息相关功能
        $step = $_GET['step'];
        switch ($step) {
            //添加
            case 'add':

                if (!isset($_POST['submit'])){
                    //添加员工首页
                    $is_edit = false;
                    $role_data = array('1'=>'管理员','2'=>'员工');
                    include 'staff_info_detail.php';
                }else{
                    //添加员工操作
                    $keys = $values = null;
                    //数据拼接
                    foreach ($_POST as $key => $value){
                        if ($key =='submit'){
                            continue;
                        }
                        $keys .= $key.',';

                        if (strlen($value)>0){
                            $values .= "'"."$value"."'".',';
                        }else{
                            $values .= 'null,';
                        }
                    }
                    $keys = rtrim($keys,',');
                    $values = rtrim($values,',');

                    $sql = "INSERT INTO user_info ($keys,user_addtime) VALUES ($values,now())";
                    if(db_exec($sql)){
                        jump('插入成功,1秒后自动跳转...','action.php?action=staff_info');
                    }else{
                        error_option("action.php?action=staff_info&step=add");
                    }
                }

                break;
            //编辑
            case 'edit':
                if(!isset($_POST['submit'])){
                    //编辑显示
                    if (isset($_GET['id'])){
                        //获得个人数据
                        $id = $_GET['id'];
                        $info_data = db_query("SELECT * FROM user_info WHERE user_id=$id");

                        $info_data = $info_data[0];

                        $is_edit = true;

                        $role_data = array('1'=>'管理员','2'=>'员工',);

                        //显示数据
                        include 'staff_info_detail.php';

                    }else{
                        error_option("action.php?action=staff_info");
                    }
                }else{
                    //编辑操作
                    if (isset($_POST['user_id'])){
                        $id = $_POST['user_id'];
                        $update_sql = null;
                        foreach ($_POST as $key => $value){

                            if ($key=='submit'||$key=='user_id')continue;

                            $update_sql .= $key.'='."'".$value."',";
                        }
                        $update_sql = rtrim($update_sql,',');
                        $sql = "UPDATE user_info SET $update_sql WHERE user_id=$id";
                        if (db_exec($sql)){
                            jump('编辑成功,1秒后自动跳转...','action.php?action=staff_info');
                        }else{
                            error_option("action.php?action=staff_info");
                        }
                    }else{
                        error_option("action.php?action=staff_info");
                    }
                }
                break;
            //删除
            case 'del':

                if (isset($_GET['id'])){
                    $id = $_GET['id'];
                    if (db_exec("UPDATE user_info SET is_used=0 WHERE user_id=$id")){
                        jump('删除成功,1秒后自动跳转...','action.php?action=staff_info');
                    }else{
                        error_option("action.php?action=staff_info");
                    }
                }else{
                    error_option("action.php?action=staff_info");
                }

                break;
            default:
                break;
        }
    }
}
function notice_info(){
    include 'notice_info.php';
}
function login_out(){
    // 清空cookie,并退出登录
    setcookie('code','a',time()-1);
    setcookie('user_id','a',time()-1);
    setcookie('timestamp','a',time()-1);
    //销毁session
    session_start();
    session_destroy();
    jump('安全退出中...','index.php');
}