<?php
/**
 * @Author: WMQ
 * @Date:   2017-07-19 09:35:38
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-07-28 21:06:36
 */
// 数据库连接
$connect=mysqli_connect('localhost','root','123456','test');
if (!$connect) {
    var_dump(mysqli_error($connect));
    exit;
}

//查询blog数据
$sql="select * from blog";
$res=mysqli_query($connect,$sql);
$blogData=array();
while ($row=mysqli_fetch_assoc($res)) {
    $blogData[]=$row;
}




if (isset($_GET['action'])) {
    $action=$_GET['action'];
    switch ($action) {
        case 'login'://登录操作
        if (isset($_POST['loginsubmit'])) {
            // 登录逻辑
            $user=$_POST['user'];
            $pwd=$_POST['pwd'];
            $pwd=md5($pwd);
            if ($user &&$pwd) {
                $res=mysqli_query($connect,"SELECT * FROM user WHERE username='$user'");
                if ($row =mysqli_fetch_assoc($res)) {
                    //对比密码

                        if($pwd==$row['pwd']) {
                            include"adminindex.html";
                        }else{
                            echo "<script>alert('密码错误')</script>";
                        }

                }else{
                    echo "<script>alert('用户名不存在')</script>";

                }
            }else{
                    echo "<script>alert('用户名或密码不能为空')</script>";
            }
        }else{
            include'login.html';
        }
            break;


        case 'register'://注册操作
        // 1.是否已经注册
        // 2.判断用户名和密码不能为空
        // 3.注册并插入数据库
            if (isset($_POST['user'])) {
                $user=$_POST['user'];
                $pwd=$_POST['pwd'];
                if ($user&&$pwd) {
                    //判断是否已经注册
                    $sql="SELECT * FROM user WHERE username='$user'";
                    $res=mysqli_query($connect,$sql);
                    if ($row=mysqli_fetch_assoc($res)) {
                        echo "<script>alert('用户名已存在不能重复注册')</script>";
                    }else{
                        $res=mysqli_query($connect,"INSERT INTO user VALUES(NULL,'$user',md5($pwd))");
                        if ($res) {
                        echo "<script>alert('注册成功！')</script>";
                        }
                    }
                }else{
                    echo "<script>alert('用户名或密码不能为空')</script>";

                }
            }
            break;


        case 'list'://博客文章管理
            include"adminBloglist.html";
            break;



        case 'delete'://发布新的blog
        $id=$_GET['id'];
        $res=mysqli_query($connect,"DELETE FROM blog WHERE id=$id");
            if ($res) {
                echo "<script>
                alert('删除成功');
                location.href='admin.php?action=list';
                </script>";
            }
            break;
        case 'addblog':
        include 'adminadd.html';
            break;




        case 'add'://发布新的blog

        //
            // exit;
        if(isset($_POST)){
            $title=$_POST['title'];
            $author=$_POST['author'];
            $content=$_POST['content'];
            $category_id=$_POST['category_id'];
            $date = date("Y-m-d H:i:s");

            if ($title==null||$author==null||$content==null||$category_id==null) {
                include "adminadd.html";
            }
            else{
                $sql1 = "INSERT INTO blog VALUES(NULL,'$title','$author','$content','$date','$category_id')";
                echo $sql1;
                $res=mysqli_query($connect,$sql1);


                if ($res) {
                    echo "发布成功";
                }
            }
        }




            break;
        case 'category'://分类管理

            break;
        default:

            break;
    }

}
