
<?php
/**
 * @Author: WMQ
 * @Date:   2017-07-19 09:24:02
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-07-28 22:09:39
 */
// 只要名字是index，代表默认首页

// blog前台的处理逻辑组织

//数据库连接
 $connect=mysqli_connect('localhost', 'root', '123456','test');
 if (!$connect) {
     echo"link error".mysqli_error($connect);
 }


//查询分类数量
 $sql="SELECT category_id,count(*)as num FROM blog GROUP BY category_id";
 $category_num=array();
 $res=mysqli_query($connect,$sql);
 while ($row=mysqli_fetch_assoc($res)) {
    $category_num[]=$row;
 }
var_dump($category_num);
//常用语调调试代码
// exit;



 //查询blog全部数据
 $sql="SELECT * FROM blog";
 // 定义一个空数组用来接收查询数据
 $data=array();
 $res=mysqli_query($connect,$sql);
 while ($row=mysqli_fetch_assoc($res)) {
     $data[]=$row;
}




//newblog改成动态的数据，如果用户没有点击，显示新的blog
//如果用户点击了，显示用户点击的数据
if (isset($_GET['blogid'])) {
   //如何根据blogid，获取blog数据
   $blogid=$_GET['blogid'];
   $sql="SELECT * FROM blog WHERE id=$blogid";
   $res=mysqli_query($connect,$sql);
   $newBlog=mysqli_fetch_assoc($res);
}else{
    //获取最新一条blog数据
    $newBlog=$data[count($data)-1];
}




//查询category的信息
 $sql="SELECT *FROM category";
 $category_data=array();
 $res=mysqli_query($connect,$sql);
 while ($row=mysqli_fetch_assoc($res)) {
     $category_data[]=$row;
}
 var_dump($category_data);
 mysqli_close($connect);



 if(isset($_GET['action'])){
    $action=$_GET['action'];
    if ($action=='bloglist') {
        include'bloglist.html';
    }
 }else{
    include 'blogindex.html';
 }