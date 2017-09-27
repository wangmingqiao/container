<?php
// 接收数据 测试
// if (isset($_GET['blogid'])) {
//     var_dump($_GET);
//     exit;
// }
 //查询数据库
 //blog的数据
 //分类信息的数据
 //html中直接使用查到数据
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

 //查询blog
 $sql="SELECT * FROM blog";
 $data=array();
 $res=mysqli_query($connect,$sql);
 while ($row=mysqli_fetch_assoc($res)) {
     $data[]=$row;
}

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
//newblog改成动态的数据，如果用户没有点击，显示新的blog
//如果用户点击了，显示用户点击的数据

//查询category的信息
 $sql="SELECT *FROM category";
 $category_data=array();
 $res=mysqli_query($connect,$sql);
 while ($row=mysqli_fetch_assoc($res)) {
     $category_data[]=$row;
}
 var_dump($category_data);

 mysqli_close($connect);


?>


<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>我的blog</title>
        <style>
            body{
                margin: 0;
                padding: 0;
                /* 文本居中 */
                text-align:center;
                /* 字体大小 */
                font-size:13px;
                background-image:url('1.jpg');
                background-size:cover;
            }
            div{
               /*  border:solid 1px red; */
                /* background-color:yellow; */
            }
            /* 整体容器设置样式 */
            .container{
                width:1500px;
                /* 居中 */
                margin:0 auto;
            }
            /* 修改头部信息 */
            .header{
                text-align:left;
            }
            /* 导航样式 */
            .navBar{
                margin:0;
                padding:0;
                height:50px;
            }
            .navBar li{
                /* 去掉样式 */
                list-style-type: none;
                /* 浮动 */
                float:left;
                width:100px;
                /* 背景 */
                background-color:black;
                /* 字体大小 */
                font-size:20px;
                /* 内边距 */
                padding:5px;

            }
            .navBar li a{
                /* 字体颜色 */
                color:white;
                /* 文本修饰 */
                text-decoration:none;
            }
            .navBar li a:hover{
                color:red;
            }
            /* 内容布局 */
            /* 左侧边 */
            .leftSide{
                float:left;
                width:290px;
                /* height:500px; */
            }
            .main{
                float:left;
                width:900px;
                /* height:500px; */
                margin:0px 10px;
            }
            .rightSide{
                float:left;
                width:290px;
                /* height:500px; */
            }
            /* 小面板样式 */
            .frame{
                font-size:18px;
                width:100%;
                background-color:yellow;
                border:solid 1px red;
                margin-bottom: 10px;
            }
            .title{
                background-color:pink;
                font-weight:bold;
                font-size:20px;
                padding:5px;
            }
            .list{
                list-style-type:none;
                padding:5px;
                margin:0px;
            }
            .list li{
                list-style-type:none;
                /* 下划线 */
                border-bottom:dotted 1px red ;
            }
            .footer{
                clear:both;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <h1>我的blog</h1>
                <p><a href="#">http://www.php7.com</a></p>
            </div>
            <div class="content">
                <div class="navBar">
                    <ul>
                        <li><a href="#">导航1</a></li>
                        <li><a href="#">导航2</a></li>
                        <li><a href="#">导航3</a></li>
                        <li><a href="#">导航4</a></li>
                    </ul>
                </div>
                <div class="leftSide">
                    <div class="frame">
                        <div class="title">个人信息</div>
                        <p>我的个人简介</p>
                    </div>
                    <!-- 点击博客列表业务逻辑 -->
                    <!-- 当用户点击blog磊表示，html请求服务器传递单条blogid给服务器 -->
                    <!-- 服务器拿到blog_id后根据id查询数据，并显示在网页 -->    <div class="frame">
                        <div class="title" >博客列表</div>
                        <ul class="list">
                            <?php foreach ($data as $value):?>
                            <!-- 如何通过超链接的方式将数据id传递给服务器 -->
                            <!-- http请求中get的方式 -->
                            <!-- get请求:就是将数据追加到url中,传递给服务器 -->
                            <!-- 追加方式 url?id=idvalue$id2=id2value -->
                            <li>
                            <a href="2blogindex.php?blogid=<?php echo $value['id']; ?>">
                            <?php echo $value['title'];?>

                            </a>
                            </li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                </div>
                <div class="main">
                    <div class="frame">
                        <div class="title">博客文章</div>
                        <h1><?php echo $newBlog['title'];?></h1>
                        <p style="text-align:left"><?php echo $newBlog['content'];?></p>
                    </div>

                </div>
                <div class="rightSide">
                    <div class="frame">
                        <div class="title">文章分类</div>
                        <ul class="list">
                            <?php foreach ($category_data as $value):?>
                            <li>
                            <a href="">
                            <?php echo $value['category'];?>
                            <?php
                                foreach ($category_num as $c) {
                                    if ($value['id']==$c['category_id']) {
                                        $num=$c['num'];
                                        echo "<span>($num)</span>";
                                    }
                                }
                            ?>
                            </a>
                            </li>
                            <?php endforeach;?>
                        </ul>
                    </div><div class="frame">
                        <div class="title">友情链接</div>
                        <ul class="list">
                            <li>列表1</li>
                            <li>列表2</li>
                            <li>列表3</li>
                        </ul>
                    </div><div class="frame">
                        <div class="title">访客统计</div>
                        <ul class="list">
                            <li>列表1</li>
                            <li>列表2</li>
                            <li>列表3</li>
                        </ul>
                    </div>
                </div>

            <div class="footer">
                <p>blog 意见反馈 电话：4008203</p>
                <p>简介|关于我们|广告服务|联系我们</p>
                <p>PHP公司版权所有</p>
            </div>
        </div>
        </div>
    </body>
</html>