<?php
// function del_dir($path){
    //1,文件夹是否存在
    $dirname="../11-ArrayMethod/";

    if (file_exists($dirname)) {
        //打开文件夹
        $dir=opendir($dirname);
        //遍历
        $i=0;

        while ($file_name=readdir($dir)) {
            //过滤

            if ($file_name=='.'||$file_name=='..') {
                continue;
            }
            //拼接完整的相对地址

            $file_path=$dirname.DIRECTORY_SEPARATOR.$file_name;

        // echo $file_name;
        $mtime=filemtime($file_path);
        $mtime=date('Y/m/d H:i:s',$mtime);


        // 类型
        $file_type=filetype($file_path);
        $file_size = transform_file_size(filesize($file_path));
        $dir_arr[$i][0]=$file_name;
        $dir_arr[$i][1]=$mtime;
        $dir_arr[$i][2]=$file_type;
        $dir_arr[$i][3]=$file_size;
        $i++;

}
         // var_dump($dir_arr);
}


  function transform_file_size($size){
    $dw='Bytes';
    if ($size>=pow(2,40)) {//td
        $size=round($size/pow(2,40),2);
        $dw='TB';
    }elseif ($size>=pow(2,30)){//gb
        $size=round($size/pow(2,30),2);
        $dw='GB';

    }elseif ($size>=pow(2,20)){//md
        $size=round($size/pow(2,20),2);
        $dw='MB';

    }elseif ($size>=pow(2,10)){//kb
        $size=round($size/pow(2,10),2);
        $dw='KB';

    }else{
        $size=$size;
    }

    return $size.$dw;
  }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>文件管理系统</title>
        <style>
            body{
                margin:0px;
                padding:0px;
            }
            .container{
                width: 70%;
                height:100%;
                margin: 0px auto;
                border: 1px red solid;
            }
            .header{
                width:100%;
                height:10%;
                border: 1px red solid;
                background-color:#99CCFF;
                display: flex;
                justify-content: center;
                align-items: center;
            .content{
                width:100%;
                height:79.5%;
                border: 1px red solid;
            }
            .footer{
                width:100%;
                height:10%;
                border: 1px red solid;
            }
        </style>
    </head>
    <body>
        <form action="file_manage.php" method="post" enctype="multipart/form-data">
            <div class="container">
                <div class="header"><h1>文件管理系统</h1></div>
                <div class="content">
                    <table width="100%" rules="all">
                        <tr align="center">
                            <td>名称</td>
                            <td>修改日期</td>
                            <td>类型</td>
                            <td>大小</td>
                            <td>操作</td>
                        </tr>
                            <tr>
                                <?php
                                    foreach ($dir_arr as $value) {
                                    echo "<tr>";
                                    echo '<td>'.$value[0].'</td>';
                                    echo '<td>'.$value[1].'</td>';
                                    echo '<td>'.$value[2].'</td>';
                                    echo '<td>'.$value[3].'</td>';
                                    echo '<td><a href="file_manage.php?action=check"><button>查看</button></a>
                                <a href="file_manage.php?action=edit"><button>编辑</button></a>
                                <a href="file_manage.php?action=del"><button>删除</button></a>
                                <a href="file_manage.php?action=upload"><button>上传</button></a>
                                <a href="file_manage.php?action=download"><button>下载</button></a></td>';
                                    echo "</tr>";
                                    }
                                ?>
                            </tr>
                    </table>
                </div>
                <div class="footer"></div>
            </div>
        </form>
    </body>

</html>