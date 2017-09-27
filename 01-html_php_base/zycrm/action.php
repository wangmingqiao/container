<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/24
 * Time: 16:57
 */
define('TMP','template'.DIRECTORY_SEPARATOR);
include_once 'DB.php';
include_once 'common.php';

if (isset($_GET['act'])){
    $_GET['act']();
}

//主页
function home(){
    $sql="SELECT customer_name,date_format(customer_birthday,'%c-%d') AS birthday,customer_mobile FROM customer_info WHERE date_format(customer_birthday,'%c-%d') BETWEEN date_format(curdate(),'%c-%d') AND date_format(curdate()+3,'%c-%d')";
    $birthday_data=db_query($sql);
    $sql="SELECT care_theme,care_nexttime,info.customer_name FROM customer_care as care,customer_info as info where care.is_used=1 and care.customer_id=info.customer_id order by care_id desc limit 3";
    $care_data=db_query($sql);
    $sql="SELECT link_theme,link_type,link_nexttime,info.customer_name from customer_linkreord as link,customer_info as info where link.is_used=1 and link.customer_id=info.customer_id order by record_id desc limit 3";
    $link_data=db_query($sql);
    $sql="SELECT notice_title,user.user_name,notice_time,notice_content from notice_info as notice,user_info as user where notice.is_used=1 and notice.user_id=user.user_id order by notice_id desc limit 3";
    $notice_data=db_query($sql);
    include_once __DIR__.DIRECTORY_SEPARATOR.TMP.'Home.php';
}

//客户信息
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
        $page_limit = 5;

        //分页配置-动作+总数+每页数+当前页
        extract(page_option("customer_info",$total_count,$page_limit,$page));


        //获取数据
        $data = db_query("SELECT customer_id AS id , customer_name,condition_name,source_name,user_name,type_name,customer_sex,customer_mobile,customer_qq,customer_email,customer_job,customer_company,customer_remark FROM customer_info  LEFT JOIN customer_condition ON customer_info.condition_id = customer_condition.condition_id LEFT JOIN customer_source ON customer_info.source_id = customer_source.source_id LEFT JOIN customer_type ON customer_info.type_id=customer_type.type_id LEFT JOIN user_info ON customer_info.user_id =user_info.user_id WHERE customer_info.is_used=1 ORDER BY customer_id DESC LIMIT $begin_num , $page_limit ;
");
        //显示数据
        include_once __DIR__.DIRECTORY_SEPARATOR.TMP.'Customer_info.php';
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
                    include_once __DIR__.DIRECTORY_SEPARATOR.TMP.'Customer_info_detail.php';
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
                            $values .= "'"."$value"."'".',';
                        }else{
                            $values .= 'null,';
                        }

                    }
                    $keys = rtrim($keys,',');
                    $values = rtrim($values,',');

                    $sql = "INSERT INTO customer_info ($keys) VALUES ($values)";
                    if(db_exec($sql)){
                        jump('插入成功,1秒后自动跳转...','/action.php?act=customer_info');
                    }else{
                        error_option("/action.php?act=customer_info&step=add");
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
                        include_once __DIR__.DIRECTORY_SEPARATOR.TMP.'Customer_info_detail.php';

                    }else{
                        error_option("/action.php?act=customer_info");
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
                            jump('编辑成功,1秒后自动跳转...','/action.php?act=customer_info');
                        }else{
                            error_option("/action.php?act=customer_info");
                        }
                    }else{
                        error_option("/action.php?act=customer_info");
                    }
                }
                break;
            //删除
            case 'del':

                if (isset($_GET['id'])){
                    $id = $_GET['id'];
                    if (db_exec("UPDATE customer_info SET is_used=0 WHERE customer_id=$id")){
                        jump('删除成功,1秒后自动跳转...','/action.php?act=customer_info');
                    }else{
                        error_option("/action.php?act=customer_info");
                    }
                }else{
                    error_option("/action.php?act=customer_info");
                }

                break;
            default:
                break;
        }
    }
}

//分配
function customer_allot(){
    if(!isset($_GET['step'])){
      $res=db_query("SELECT count(customer_id) as count FROM customer_info WHERE is_used=1 ");
      $total_count=$res[0]['count'];
      $page_limit=3;
      $page=@intval($_GET['page'])?:1;
      extract(page_option('customer_allot',$total_count,$page_limit,$page));

   $sql="SELECT customer_info.customer_id,customer_name,condition_name,source_name ,type_name,customer_addtime,customer_company,customer_remark FROM customer_info INNER JOIN    customer_condition ON customer_info.condition_id=customer_condition.condition_id INNER JOIN customer_source ON customer_info.source_id=customer_source.source_id LEFT JOIN customer_type ON customer_info.type_id=customer_type.type_id WHERE customer_info.is_used =1 ORDER BY customer_id DESC LIMIT {$begin_num},{$total_page}";
   $customer_data=db_query($sql);
         include_once __DIR__.DIRECTORY_SEPARATOR.TMP.'Customer_allot.php';
     }else{
         $step=$_GET['step'];
         switch ($step) {
             case 'allot':
             if (!isset($_POST['submit'])) {
                 $is_allot=false;
                 $id=$_GET['id'];
//                 var_dump($id);exit;
                 $sql_1="select customer_name,customer_id from customer_info WHERE customer_id={$id} AND is_used=1;";
                 $customer_info=db_query($sql_1)[0];
//                 var_dump($customer_name['customer_id']);exit;
           $sql_2="SELECT user_name,user_id FROM user_info WHERE is_used=1";
           $user_data=db_query($sql_2);
                include_once __DIR__.DIRECTORY_SEPARATOR.TMP.'Customer_allot_detail.php';
             }else{
                $id=$_POST['user_id'];
                 $customer_id=$_POST['customer_id'];
//                 var_dump($id);exit;
                 if(db_exec("update customer_info set user_id={$id}
                where customer_id='{$customer_id}'")){
                     jump('修改成功，..','action.php?act=customer_allot');
                 }else{
                     error_option('action.php?act=customer_allot&step=allot');
                 }

                }
               break;
         }
     }
}

//关心

function customer_care(){
if(!isset($_GET['step'])){
      //分页功能-根据数据库的数据做分页功能
      //总条数
      $res=db_query("SELECT count(care_id) as count FROM customer_care WHERE is_used=1");
      // var_dump($res);
      $total_count=$res[0]['count'];
      //每页的条数
      $page_limit=3;
     //当前页数
     $page =@intval($_GET['page'])?:1;

     //将数组中的元素之间写入到参数表中
     extract(page_option('customer_care',$total_count,$page_limit,$page));



  //显示数据-数据库
      $sql="SELECT care_id,customer_name,care_theme,care_way,care_time,care_nexttime,care_remark,care_people FROM customer_care  INNER JOIN customer_info  ON customer_care.customer_id = customer_info.customer_id  WHERE customer_care.is_used=1 ORDER BY customer_care.care_id DESC LIMIT {$begin_num},{$total_page}";
        $care_date=db_query($sql);

    include_once __DIR__.DIRECTORY_SEPARATOR.TMP.'Customer_care.php';
}else{
    //功能操作
    $step=$_GET['step'];
    switch ($step) {
        case 'add':

        if (!isset($_POST['submit'])) {
            //进入添加关怀页面
             $is_edit=false;
             //从session中获取user_id
             session_start();
             $user_id=$_SESSION['user_id'];
             //关怀对象
             $care_obj_data=db_query("SELECT customer_id as id,customer_name as name FROM customer_info WHERE is_used=1 AND user_id={$user_id}");

             //关怀方式
           $care_way_data = array('送礼品卡','打电话问候','请客吃饭','一起开黑');
           //加载模版
           include_once __DIR__.DIRECTORY_SEPARATOR.TMP.'Customer_care_detail.php';
        }else{

            // var_dump($_POST);
            $keys = $values = null;
            //使用循环拼接sql语句
            foreach ($_POST as $key => $value) {
              if ($key=='submit') continue;
            $keys.=$key.',';
            $values .="'{$value}',";
            }
             $keys=rtrim($keys,',');
             $values=rtrim($values,',');

              session_start();
             $user_name=$_SESSION['user_name'];

             $sql ="INSERT INTO customer_care ({$keys},care_time,care_people) VALUE ({$values},NOW(),'{$user_name}')";
             if (db_exec($sql)){
                jump('插入成功，1秒后跳转....','action.php?act=customer_care');
             }else{
                error_option('action.php?act=customer_care&step=add');
                   }
            }

            break;
            case'edit':
            if (!isset($_POST['submit'])) {
            //显示编辑页面
             $id=$_GET['id'];

             $care_info_data =db_query("SELECT * FROM customer_care WHERE care_id={$id}")[0];
             //进入添加关怀页面
             $is_edit=true;
             //从session中获取user_id
             session_start();
             $user_id=$_SESSION['user_id'];
             //关怀对象
             $care_obj_data=db_query("SELECT customer_id as id,customer_name as name FROM customer_info WHERE is_used=1 AND user_id={$user_id}");

             //关怀方式
           $care_way_data = array('上门拜访','发短信','送礼品卡','打电话问候','请客吃饭','一起开黑');
           //加载模版
                include_once __DIR__.DIRECTORY_SEPARATOR.TMP.'Customer_care_detail.php';
            }else{
            //编辑提交

            $keys = $values = null;
            //使用循环拼接sql语句
            $update_sql=null;
            foreach ($_POST as $key => $value) {
                if($key=='submit') continue;
                 $update_sql .="{$key}='{$value}',";
            }
            // var_dump($update_sql);exit;
                $update_sql=rtrim($update_sql,',');

              $id=$_POST['care_id'];

             $sql ="UPDATE customer_care SET {$update_sql},care_time=NOW() WHERE care_id ={$id}";
             //执行sql语句
             if (db_exec($sql)){
                jump('插入成功，1秒后跳转....','action.php?act=customer_care');
             }else{
                error_option('action.php?act=customer_care&step=edit&id={$id}');
             }

            }

            break;
        case'del':
            $id=$_GET['id'];
            if (db_exec("UPDATE customer_care SET is_used=0 WHERE care_id={$id}")) {
                jump('插入成功，1秒后跳转....','action.php?act=customer_care');
            }else{
                error_option("action.php?act=customer_care");
            }



             break;
        default:

            break;
    }
   }
}
//类型
function customer_type(){
      if(!isset($_GET['step'])){
      //分页功能-根据数据库的数据做分页功能
      //总条数
      $res=db_query("SELECT count(type_id) as count FROM customer_type WHERE is_used=1");
      // var_dump($res);
      $total_count=$res[0]['count'];
      //每页的条数
      $page_limit=3;
     //当前页数
     $page =@intval($_GET['page'])?:1;

     //将数组中的元素之间写入到参数表中
     extract(page_option('customer_type',$total_count,$page_limit,$page));

       $sql="SELECT  type_id,type_name FROM customer_type WHERE is_used=1 LIMIT {$begin_num},{$page_limit}";
       $c_type_data=db_query($sql);

        include_once __DIR__.DIRECTORY_SEPARATOR.TMP.'Customer_type.php';
    }else{
    $step=$_GET['step'];
    switch ($step) {
        case 'add':
        if(!isset($_POST['submit'])){

        include_once __DIR__.DIRECTORY_SEPARATOR.TMP.'Customer_type_detail.php';
            }else{

             $type_name=$_POST['type_name'];
             $is_used=1;
             $sql="INSERT INTO customer_type(type_name,is_used) VALUE ('$type_name',$is_used)";
            // $c_type_add=db_query($sql);
            // var_dump($c_type_add);exit;
            if(db_exec($sql)){
                jump('插入成功，1秒后跳转....','action.php?act=customer_type');
            }else{
                error_option('action.php?act=customer_type&step=add');
            }
            }

            break;

        case 'del':
             $id=$_GET['id'];
            if(db_exec("UPDATE customer_type SET is_used=0 WHERE type_id={$id} ")){
                jump('删除成功,1秒后自动跳转..','action.php?act=customer_type');
            }else{
                error_option("action.php?act=customer_type");
            }

            break;
        default:
            # code...
            break;
    }
}
}
//状态
function customer_status(){
     if(!isset($_GET['step'])){
      $res=db_query("SELECT count(condition_id) as count FROM customer_condition  WHERE is_used=1 ");
      $total_count=$res[0]['count'];
      $page_limit=3;
      $page=@intval($_GET['page'])?:1;
      extract(page_option('customer_status',$total_count,$page_limit,$page));
     $sql="SELECT condition_id,condition_name,condition_explain FROM customer_condition WHERE is_used=1 LIMIT {$begin_num},{$page_limit}";
     $c_condition_data=db_query($sql);
       include_once __DIR__.DIRECTORY_SEPARATOR.TMP.'Customer_status.php';
     }else{
    $step=$_GET['step'];
    switch ($step) {
        case 'add':
        if(!isset($_POST['submit'])){

        include_once __DIR__.DIRECTORY_SEPARATOR.TMP.'Customer_status_detail.php';
            }else{
            $is_used=1;
            $condition_name=$_POST['condition_name'];
            $condition_explain=$_POST['condition_explain'];
            $sql="INSERT INTO customer_condition(condition_name,condition_explain,is_used) VALUE ('$condition_name','$condition_explain','$is_used')";
            if(db_exec($sql)){
            jump('添加成功，1秒后跳转...','action.php?act=customer_status');
            }else{
                error_option('action.php?act=customer_status&step=add');
            }
        }
               break;
           case'del':
           $id=$_GET['id'];
           if(db_exec("UPDATE customer_condition SET is_used=0 WHERE condition_id={$id}")){
            jump('删除成功，1秒后跳转...','action.php?act=customer_status');
           }else{
            error_option('action.php?act=customer_status');
           }
           break;
           default:

               break;
       }
     }

}
//来源
function customer_source(){
    if (!isset($_GET['step'])) {
     $res=db_query("SELECT count(source_id) as count FROM customer_source  WHERE is_used=1 ");
      $total_count=$res[0]['count'];
      $page_limit=3;
      $page=@intval($_GET['page'])?:1;
      extract(page_option('customer_source',$total_count,$page_limit,$page));
     $sql="SELECT source_id,source_name FROM customer_source WHERE is_used=1 LIMIT {$begin_num},{$page_limit}";
     $c_source_data=db_query($sql);
      include_once __DIR__.DIRECTORY_SEPARATOR.TMP.'Customer_source.php';
    }else{
    $step=$_GET['step'];
    switch ($step) {
          case 'add':
            if (!isset($_POST['submit'])) {
             include_once __DIR__.DIRECTORY_SEPARATOR.TMP.'Customer_source_detail.php';
            }else{
             $is_used=1;
             $source_name=$_POST['source_name'];
             if(db_exec("INSERT INTO customer_source(source_name,is_used) VALUE ('$source_name','$is_used')")){
                jump('添加成功，1秒后跳转..','action.php?act=customer_source');
             }else{
                error_option('action.php?act=customer_source&step=add');
             }
         }
              break;

        case'del':
           $id=$_GET['id'];
           if(db_exec("UPDATE customer_source SET is_used=0 WHERE source_id={$id}")){
            jump('删除成功，1秒后跳转...','action.php?act=customer_source');
           }else{
            error_option('action.php?act=customer_source');
           }
             break;
          default:

              break;
      }

    }
    }


//练习记录
function customer_linkrecord(){
    if (!isset($_GET['step'])) {
       $res=db_query("SELECT count(record_id) as count FROM customer_linkreord WHERE is_used=1");
       $total_count=$res[0]['count'];
       $page_limit=3;
       $page=@intval($_GET['page'])?:1;
       extract(page_option('customer_linkrecord',$total_count,$page_limit,$page));
       $sql="SELECT record_id, customer_name,link_time,link_nexttime,link_type,link_theme,link_remark FROM customer_info RIGHT JOIN customer_linkreord ON customer_info.customer_id=customer_linkreord.customer_id WHERE customer_linkreord.is_used=1 LIMIT {$begin_num},{$page_limit}";
       $c_link_data=db_query($sql);
//        var_dump($c_link_data);exit;
          include_once __DIR__.DIRECTORY_SEPARATOR.TMP.'Customer_link.php';
    }else{
        $step=$_GET['step'];
        switch ($step) {
            case 'add':
                if(!isset($_POST['submit'])){
                    $is_edit=false;
            $sql="SELECT customer_linkreord.customer_id as id, customer_name as name,link_time,link_nexttime,link_type,link_theme,link_remark ,who_link FROM customer_info RIGHT JOIN customer_linkreord ON customer_info.customer_id=customer_linkreord.customer_id INNER JOIN user_info ON user_info.user_name=customer_linkreord.who_link WHERE customer_linkreord.is_used=1";

            $c_link_obj=db_query($sql);
//                    var_dump($c_link_obj);
              include_once __DIR__.DIRECTORY_SEPARATOR.TMP.'Customer_link_detail.php';
                }else{
                   $keys=$values=null;
                   foreach ($_POST as $key => $value) {
                       if ($key=='submit') continue;
                    $keys .=$key.',';
                    $values .="'$value'," ;
                   }
                $keys=rtrim($keys,',');
                $values=rtrim($values,',');
                $sql_1="INSERT INTO customer_linkreord ({$keys},link_time) VALUE ({$values},NOW())";
                if(db_exec($sql_1)){
                    jump('插入成功，1秒后跳转....','action.php?act=customer_linkrecord
                        ');
                 }else{
                    error_option('action.php?act=customer_linkrecord&step=add');
                 }
                }
                 break;
                case 'edit':
                if(!isset($_POST['submit'])){
                    $is_edit=true;
                    $c_link_obj=db_query("SELECT customer_linkreord.customer_id as id, customer_name as name,link_time,link_nexttime,link_type,link_theme,link_remark ,who_link FROM customer_info RIGHT JOIN customer_linkreord ON customer_info.customer_id=customer_linkreord.customer_id INNER JOIN user_info ON user_info.user_name=customer_linkreord.who_link WHERE customer_linkreord.is_used=1");
                    $id=$_GET['id'];
                    $sql="SELECT info.customer_id as id,info.customer_name as name,link.link_theme,link.link_nexttime,link.link_type,link.link_remark from customer_info as info,customer_linkreord as link WHERE info.customer_id=link.customer_id and link.record_id=$id";
                    $c_link_r=db_query($sql);
//                    var_dump($c_link_r);exit;
                    $c_link_info=$c_link_r[0];
                    include_once __DIR__.DIRECTORY_SEPARATOR.TMP.'Customer_link_detail.php';
                }else{
                    $update_sql=null;
                    foreach ($_POST as $key => $value) {
                        if ($key=='submit') continue;
                        $update_sql.="{$key}='{$value}',";
                    }
                      $update_sql=rtrim($update_sql,',');
                    $id=$_POST['record_id'];
                    $sql_1=" UPDATE customer_linkreord SET {$update_sql},link_time =NOW() WHERE record_id={$id}";
                    if(db_exec($sql_1)){
                        jump('编辑成功，1秒后跳转....','action.php?act=customer_linkrecord');
                    }else{
                        error_option('action.php?act=customer_linkrecord&step=edit');
                    }
                }

                break;
            case 'del':
              $id=$_GET['id'];
              if(db_exec("UPDATE customer_linkreord SET is_used=0 WHERE record_id=$id")){
                jump('删除成功，1秒后跳转...','action.php?act=customer_linkrecord');
              }else{
                error_option('action.php?act=customer_linkrecord');
              }
               break;
            default:
                # code...
                break;
        }
    }

}
//用户信息
function user_info(){
    if(!isset($_GET['step'])){
        $res=db_query("SELECT count(user_id) as count FROM user_info WHERE is_used=1");
        $total_count=$res[0]['count'];
        $page_limit=3;
        $page=@intval($_GET['page'])?:1;
        extract(page_option('user_info',$total_count,$page_limit,$page));
        $sql=" SELECT user_id,user_name,user_sex,user_age,user_email from user_info where is_used=1 order by user_id desc limit {$begin_num},{$page_limit}";
        $user_data=db_query($sql);
        include_once __DIR__.DIRECTORY_SEPARATOR.TMP.'User_info.php';
    }else{
        $step=$_GET['step'];
        switch($step){
            case 'add':
                if(!isset($_POST['submit'])){
                    $is_edit =false;
                    $user_info=db_query("SELECT user_id ,user_name,user_sex,user_mobile,user_age,user_address,user_tel,user_idnum,user_email, user_addtime,user_addman,user_changetime,user_changeman,user_interest,user_diploma,user_bankcard,user_nation,is_married FROM user_info WHERE is_used=1");
//                var_dump($user_info[0]['user_sex']);exit;
                    include_once __DIR__.DIRECTORY_SEPARATOR.TMP.'User_info_detail.php';
                }else{
                        $user_sex = $_POST['user_sex'];
                        $user_age = $_POST['user_age'];
                        $user_tel = $_POST['user_tel'];
                        $user_email = $_POST['user_email'];

                        $sql="INSERT INTO user_info(user_sex,user_age,user_tel,user_email) VALUE ('$user_sex','$user_age','$user_tel','$user_email')";
                    if(db_exec($sql)){
                        jump('添加成功，1秒后跳转...','action.php?act=user_info');
                 }else{
                        error_option('action.php?act=user_info&step=add');
                    }

                }
                break;

            case 'edit':
                if(!isset($_POST['submit'])){
                    $is_edit=true;
                    $sql="SELECT * FROM user_info WHERE is_used=1";
                    $user_info=db_query($sql);
                    $id=$_GET['id'];
                    $sql="SELECT user_id user_name,user_sex,user_mobile,user_age,user_address,user_tel,user_idnum,user_email, user_addtime,user_addman,user_changetime,user_changeman,user_interest,user_diploma,user_bankcard,user_nation,is_married FROM user_info WHERE user_id={$id} ";
                    $info_data=db_query($sql)[0];
//                    var_dump($info_data);exit;
                    include_once __DIR__.DIRECTORY_SEPARATOR.TMP.'User_info_detail.php';
                }else{
                    $update_sql=null;
                    foreach ($_POST as $key => $value) {
                        if ($key=='submit') continue;
                        $update_sql.="{$key}='{$value}',";
                    }
                    $update_sql=rtrim($update_sql,',');
                    $id=$_POST['user_id'];
//                    var_dump($id);exit;
                    $sql_1=" UPDATE user_info SET {$update_sql} WHERE user_id={$id}";
                    if(db_exec($sql_1)){
                        jump('编辑成功，1秒后跳转....','action.php?act=user_info');
                    }else{
                        error_option('action.php?act=user_info&step=edit');
                    }
                }

                break;

            case'del':
                $id=$_GET['id'];
                if(db_exec("UPDATE user_info SET is_used=0 WHERE
user_id={$id}")){
                    jump('删除成功...','action.php?act=user_info');
                }else{
                    error_option('action.php?act=user_info');
                }


                break;
        }
    }

}
//公告
function notic(){
    if(!isset($_GET['step'])){
        $res=db_query("SELECT count(notice_id) as count FROM notice_info WHERE is_used=1");
        $total_count=$res[0]['count'];
        $page_limit=3;
        $page=@intval($_GET['page'])?:1;
        extract(page_option('notic',$total_count,$page_limit,$page));
        $sql="SELECT notice_id,user_name,notice_title,notice_content,notice_time,notice_endtime FROM
              notice_info INNER JOIN user_info ON notice_info.user_id=user_info.user_id WHERE   notice_info.is_used=1 order by notice_id desc limit {$begin_num},{$page_limit}";
              $notice_data=db_query($sql);
        include_once __DIR__.DIRECTORY_SEPARATOR.TMP.'Customer_notic.php';
    }else{
        $step=$_GET['step'];
        switch($step){
            case 'add':
                if(!isset($_POST['submit'])){
                   $is_edit=false;
                    $sql="SELECT user_id,user_name FROM  user_info WHERE is_used=1";
                    $user_data=db_query($sql);
                    include_once __DIR__.DIRECTORY_SEPARATOR.TMP.'Customer_notice_detail.php';
                }else{
                    $keys=$values=null;
                    foreach($_POST as $key =>$value){
                        if($key=='submit') continue;
                        $keys.=$key.',';
                        $values.="'$value',";
                    }
                    $keys=rtrim($keys,',');
                    $values=rtrim($values,',');
//                    var_dump($keys);
//                    var_dump($values);exit;
                    $sql_1="INSERT INTO notice_info({$keys},notice_time) VALUE ({$values},NOW())";
                        if(db_exec($sql_1)){
                            jump('添加成功，...','action.php?act=notic');
                        }else{
                            error_option('action.php?act=notic&step=add');
                        }
                }
                break;
            case 'edit':
                if(!isset($_POST['submit'])){
                    $is_edit=true;
                    $sql_1="SELECT user_id,user_name FROM  user_info WHERE is_used=1";
                    $user_data=db_query($sql_1);
                    $id=$_GET['id'];
                    $sql_2="SELECT notice_info.user_id,notice_id,user_name,notice_title,                                         notice_content,notice_time, notice_endtime FROM notice_info INNER JOIN                              user_info ON notice_info.user_id=user_info.user_id WHERE  notice_info                               .is_used=1 AND notice_id={$id} ";
                    $notice_data=db_query($sql_2)[0];
//                    var_dump($notice_data);
                    include_once __DIR__.DIRECTORY_SEPARATOR.TMP.'Customer_notice_detail.php';
                }else{
                    $update_sql=null;
                    foreach ($_POST as $key => $value) {
                        if ($key=='submit') continue;
                        $update_sql.="{$key}='{$value}',";
                    }
                    $update_sql=rtrim($update_sql,',');
                    $id=$_POST['notice_id'];
                    $sql_1=" UPDATE notice_info SET {$update_sql} WHERE notice_id={$id}";
                    if(db_exec($sql_1)){
                        jump('编辑成功，1秒后跳转....','action.php?act=notic');
                    }else{
                        error_option('action.php?act=notic&step=edit');
                    }
                }
                break;
            case'del':
                $id=$_GET['id'];
                if(db_exec("UPDATE notice_info SET is_used=0 WHERE notice_id=$id")){
                    jump('删除成功，..','action.php?act=notic');
                }else{
                    error_option('action.php?act=notic');
                }
                break;
        }
    }

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


