<?php
/**
 * @Author: WMQ
 * @Date:   2017-08-23 19:56:53
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-08-29 15:06:31
 */
$host='192.168.12.238';
$user='root';
$pwd='123456';
$db='crm';
$pdo= new pdo("mysql:host=$host;dbname=$db",$user,$pwd);
if (isset($_GET['action'])) {
    $action=$_GET['action'];
    switch ($action) {
        case 'denglu':
            $name=$_POST['user'];
            $pwd = $_POST['p'];
                try {
                    $res= $pdo->query("select user,pwd from user");
                    while($row=$res->fetch()){
                        // print_r($row);
                        if($name==$row['user']&&$pwd==$row['pwd']){
                            include 'control.php';
                        }else{
                            echo "<script>alert('用户名或密码错误，请重新输入！')</script>";
                            include 'denglu.html';
                        }
                    }
                } catch (Exception $e) {
                    echo $e->getMessage;
                }
            break;
        case 'cus_add':
            $name=$_POST['name'];
            $source = $_POST['source'];
            $position = $_POST['position'];
            $type = $_POST['type'];
            $sex = $_POST['sex'];
            $email = $_POST['email'];
            $birthday = $_POST['birthday'];
            $status = $_POST['status'];
            $tel = $_POST['tel'];
            $QQ = $_POST['QQ'];
            $adress=$_POST['adress'];
            $y_name = $_POST['y_name'];
            $weibo = $_POST['weibo'];
            $tel = $_POST['tel'];
            $phone=$_POST['phone'];
            $msn = $_POST['msn'];
            $company = $_POST['company'];
            $note = $_POST['note'];
            try {
                    if($name==null||$company==null){
                        echo "<script>alert('客户姓名和公司为必填项！！！')</script>";
                    }else{
                        $res= $pdo->exec("INSERT into customer values('','$name','$status','$source','$y_name','$type','$sex','$tel','$QQ','$email','$position','$company','$note','$birthday','$adress','$weibo','$phone','$msn')");
                        if ($res>0) {
                            echo "<script>alert('添加成功！')</script>";
                            include 'customer.php';
                        }
                    }
            } catch (Exception $e) {
                echo $e->getMessage;
            }
            break;
        case 'cus_dele':
            $id=$_GET['id'];
            try {
                $res=$pdo->exec("DELETE FROM customer where c_id='$id'");
                if ($res>0) {
                    echo "<script>alert('删除成功！')</script>";
                    include'customer.php';
                }
            } catch (Exception $e) {
                echo $e->getMessage;
            }
            break;
        case 'cus_update':
            // $c_id=$_GET['id'];
            // $y_name=$_POST['y_name'];
            $y_name = $_POST['y_name'];
            $c_id = $_POST['c_id'];
            try {
                $sql  = "UPDATE customer SET y_name='$y_name' WHERE c_id='$c_id'";
                $res=$pdo->exec($sql);
                if ($res>0) {
                    echo " <script>alert('修改成功')</script>";
                    include 'cus_allot.php';
                }

            } catch (Exception $e) {
                echo $e->getMessage;
            }
            break;
        case 'cus_modi':
            $id=$_GET['id'];
            $name=$_POST['name'];
            $source = $_POST['source'];
            $position = $_POST['position'];
            $type = $_POST['type'];
            $sex = $_POST['sex'];
            $email = $_POST['email'];
            $birthday = $_POST['birthday'];
            $status = $_POST['status'];
            $tel = $_POST['tel'];
            $QQ = $_POST['QQ'];
            $adress=$_POST['adress'];
            $y_name = $_POST['y_name'];
            $weibo = $_POST['weibo'];
            $tel = $_POST['tel'];
            $phone=$_POST['phone'];
            $msn = $_POST['msn'];
            $company = $_POST['company'];
            $note = $_POST['note'];
            $res=$pdo->exec("UPDATE customer set name='$name',status='$status',source='$source',y_name='$y_name',type='$type',sex='$sex',tel='$sex',tel='$tel',QQ='$QQ',email='$email',position='$position',company='$company',note='$note',birthday='$birthday',adress='$adress',weibo='$weibo',phone='$phone',msn='$msn' where c_id='$id'");
            if ($res>0) {
                echo "<script>alert('修改成功')</script>";
                include 'customer.php';
                }else{
                    echo "<script>alert('修改失败')</script>";
                }
            break;
        case 'cus_show_add':
            $showtitle=$_POST['showtitle'];
            $name=$_POST['name'];
            $nexttime=$_POST['nexttime'];
            $showway=$_POST['showway'];
            $note=$_POST['note'];
            $res=$pdo->exec("INSERT INTO cus_show (showtitle,name,nexttime,showway,note) VALUES ('$showtitle','$name','$nexttime','$showway','$note')");
            if ($res>0 ) {
            echo "<script>alert('成功')</script>";
            include 'cus_show.php';
            }
            break;
        case 'cus_show_dele':
            $id=$_GET['id'];
            $res=$pdo->exec("DELETE FROM cus_show WHERE id='$id'");
            if ($res>0) {
                echo "<script>alert('删除成功')</script>";
                include 'cus_show.php';
                }else{
                echo "删除失败";
                }
                break;
        case 'm_update':
            $id = $_GET['id'];
            echo $id;
            $showtitle=$_POST['showtitle'];
            $name = $_POST['name'];
            $showtime=$_POST['showtime'];
            $nexttime=$_POST['nexttime'];
            $showway=$_POST['showway'];
            $note=$_POST['note'];
            // echo $note;
            try {
                $sql  = "UPDATE cus_show SET name='$name' ,showtitle='$showtitle',showway='$showway',showtime='$showtime',nexttime='$nexttime',note='$note' WHERE id='$id'";
                echo $sql;
                $res=$pdo->exec($sql);
                if ($res>0) {
                    echo " <script>alert('修改成功')</script>";
                    include 'cus_show.php';
                }else {
                   echo "1";
                }

            } catch (Exception $e) {
                echo $e->getMessage;
            }
            // break;
        case 'cus_allot_add':
            $y_name=$_POST['y_name'];
            $res=$pdo->exec("INSERT INTO customer (y_name) VALUES('$y_name')");
            if ($res>0) {
                echo " <script>alert('分配成功')</script> ";
                include 'cus_allot.php';
            }else{
                echo " <script>alert('添加失败')</script> ";
            }
            break;
        case 'cus_type_add':
            $type=$_POST['type'];
            try {
                if ($type==null) {
                    echo "<script>alert('客户类型不能为空！')</script>";
                }else{
                    $res=$pdo->exec("INSERT into cus_type values ('','$type')");
                    if ($res>0) {
                        echo "<script>alert('添加成功！')</script>";
                        include 'cus_type.php';
                    }
                }
                $pdo=null;
            } catch (Exception $e) {
                echo $e->getMessage;
            }
            break;
        case 'cus_type_dele':
            $id=$_GET['id'];
            try {
                $res=$pdo->exec("DELETE FROM cus_type where id='$id'");
                if ($res>0) {
                    echo "<script>alert('删除成功！')</script>";
                    include'cus_type.php';
                }
            } catch (Exception $e) {
                echo $e->getMessage;
            }
            break;
        case 'status_add':
            $status=$_POST['status'];
            $cus_describe=$_POST['cus_describe'];
            try {
                if ($status==null||$cus_describe==null) {
                    echo "<script>alert('客户状态和状态描述不能为空！')</script>";
                    include 'status_add.php';
                }else{
                    $res=$pdo->exec("INSERT into cus_status values ('','$status','$cus_describe')");
                    if ($res>0) {
                        echo "<script>alert('插入成功！')</script>";
                        include 'status.php';
                    }
                }
            } catch (Exception $e) {
                echo $e->getMessage;
            }
            break;
        case 'status_dele':
            $id=$_GET['id'];
            try {
                $res=$pdo->exec("DELETE FROM cus_status where id='$id'");
                if ($res>0) {
                    include'status.php';
                    echo "<script>alert('删除成功！')</script>";
                }
            } catch (Exception $e) {
                echo $e->getMessage;
            }
            break;
        case 'source_add':
            $type=$_POST['type'];
            $source=$_POST['source'];
            try {
                if ($type==null||$source==null) {
                    echo "<script>alert('客户状态和客户来源不能为空！')</script>";
                    include 'source_add.php';
                }else{
                    $res=$pdo->exec("INSERT INTO cus_source values('','$source');INSERT INTO cus_type values('','$type')");
                    if ($res>0) {
                        echo "<script>alert('添加成功！')</script>";
                        include 'source.php';
                    }
                }
            } catch (Exception $e) {
                echo $e->getMessage;
            }
            break;
        case 'source_dele':
            $id=$_GET['id'];
            try {
                $res=$pdo->exec("DELETE FROM cus_source where s_id='$id'");
                if ($res>0) {
                    echo "<script>alert('删除成功！')</script>";
                    include'source.php';
                }
            } catch (Exception $e) {
                echo $e->getMessage;
            }
            break;
        case 'phone_add':
            $c_title=$_POST['c_title'];
            $name=$_POST['name'];
            $c_time=date('Y-m-d H:i:s');
            $next_ctime=$_POST['next_ctime'];
            $c_type=$_POST['c_type'];
            $c_note=$_POST['c_note'];
            try {
                if ($c_title==null||$name==null) {
                    echo "<script>alert('联系主题和联系对象不能为空！')</script>";
                    include 'phone_add.php';
                }else{
                    $res=$pdo->exec("INSERT INTO contact values('','$name','$c_time','$next_ctime','$c_type','$c_title','$c_note')");
                    if ($res>0) {
                        echo "<script>alert('添加成功！')</script>";
                        include 'phone.php';
                    }
                }
            } catch (Exception $e) {
                echo $e->getMessage;
            }
            break;
        case 'phone_dele':
            $id=$_GET['id'];
            try {
                $res=$pdo->exec("DELETE FROM contact where c_id='$id'");
                if ($res>0) {
                    echo "<script>alert('删除成功！')</script>";
                    include'phone.php';
                }
            } catch (Exception $e) {
                echo $e->getMessage;
            }
            break;
        case 'staff_dele':
            $id=$_GET['id'];
            try {
                $res=$pdo->exec("DELETE FROM staff where y_id='$id'");
                if ($res>0) {
                    echo "<script>alert('删除成功！')</script>";
                    include'staff.php';
                }
            } catch (Exception $e) {
                echo $e->getMessage;
            }
            break;
        case 'staff_modi':
            $id=$_GET['id'];
            $y_name=$_POST['y_name'];
            $y_sex=$_POST['y_sex'];
            $y_age=$_POST['y_age'];
            $y_tel=$_POST['y_tel'];
            $y_eamil=$_POST['y_eamil'];
            $res=$pdo->exec("UPDATE staff set y_name='$y_name',y_sex='$y_sex',y_age='$y_age',y_tel='$y_tel',y_eamil='$y_eamil' where y_id='$id'");
            if ($res>0) {
                echo "<script>alert('修改成功！')</script>";
                include 'staff.php';
            }else{
                echo "<script>alert('修改失败')</script>";
            }
        default:
            # code...
            break;
    }
}
