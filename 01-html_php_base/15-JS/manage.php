<?php
/**
 * @Author: WMQ
 * @Date:   2017-08-10 09:19:46
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-08-14 08:25:39
 */
//1.list文件
if (!isset($_GET['action'])) {
    $file_path="../../zhengke/";
    list_file($file_path);
}else{
    $action=$_GET['action'];//方法名
        if ($action=='modify_file'&& isset($_POST['file_content'])) {
            //修改之后的保存操作
            $action($_POST['filepath'],$_POST['file_content']);

        }elseif($action=='move_file'&& isset($_POST['d_file_path'])){
            //用户选中之后的移动操作
            $action($_POST['filepath'],$_POST['d_file_path']);

        }else{
            //根据不同action操作
            $action($_GET['filepath']);
        }

}
//1.显示
function list_file($file_path){
    //打开
    $dir=opendir($file_path);
    //循环遍历
    echo '<div class="container">
                <div class="header"><h1>文件管理系统</h1></div>
                <div class="content"> <table>
    <tr align="center">
        <td>文件名</td>
        <td>类型</td>
        <td>操作</td>
    </tr>';

    while ($file_name=readdir($dir)) {
        if ($file_name=='.'||$file_name=='..') {
            continue;
        }
        $f_path=$file_path.DIRECTORY_SEPARATOR.$file_name;
        $type=filetype($f_path);
        //三元运算符
        //(条件)?(满足选项):(不满足选项)
        $type=($type=='file')?'文件':'文件夹';
        echo "<tr>
            <td>{$file_name}</td>
            <td>{$type}</td>
            <td>
                <a href='homework.php?action=show_content&filepath={$f_path}'><button>查看</button></a>
                <a href='homework.php?action=modify_file&filepath={$f_path}'><button>修改</button></a>
                <a href='homework.php?action=del_file&filepath={$f_path}'><button>删除</button></a>
                <a href='homework.php?action=down_file&filepath={$f_path}'><button>下载</button></a>
                <a href='homework.php?action=move_file&filepath={$f_path}'><button>移动</button></a>
            </td>
        </tr>
        ";
    }
    closedir($dir);
    echo '</table></div></div>';
}
//2.查看，删除，上传，下载，移动
function show_content($file_path){
    if (is_dir($file_path)) {
        list_file($file_path);
    }else{//文件操作
        //将文件内容放入textarea里面显示
        //textarea disabled(不可编辑)
        $file_content=file_get_contents($file_path);
        echo
        "<textarea style='width:80%;height:500px' disabled>{$file_content}</textarea>";
    }
}
function modify_file($file_path,$file_content=''){
    if (is_dir($file_path)) {
        echo '对不起，文件夹不能修改';
        return;
    }
    if (strlen($file_content)>1) {
        //保存
        if (file_put_contents($file_path,$file_content)) {
            echo '保存成功';
        }else{
            echo '保存失败';
        }
    }else{
        //显示
    $file_content=file_get_contents($file_path);
    echo
    "<form action='homework.php?action=modify_file' method='post'>
            <input type='hidden' name='filepath' value='{$file_path}'>
            <textarea style='width:80%;height:400px' name='file_content'>{$file_content}</textarea>
            <input type='submit' value='保存'>
        </form>";
    }
}
function del_file($file_path){
    if (is_dir($file_path)) {
        if(del_dir($file_path) ){
            echo '删除成功';
        }else{
            echo '删除失败';
        }
    }else{
        if (unlink($file_path)) {
            echo '删除成功';
        }else{
            echo'删除失败';
        }
    }
}
function down_file($file_path){
    if (is_dir($file_path)) {
        echo '文件夹不能下载';
    }else{
        $filesize=filesize($file_path);
        $filename=basename($file_path);
        //文件下载
        header("content-type:application/octet-stream");//类型
        header("accept-ranges:bytes");//接收方式：字节
        header("accept_length:{$filesize}");//文件的长度
        header("content-disposition:attachment;filename={$filename}");//附件处理方式
        //输出文件、
        readfile($file_path);

    }
}
function move_file($s_file_path,$d_file_path=''){
    if (strlen($d_file_path)>0) {
        //移动操作
        //用户选择完毕使用form表单的方式提交--选过的
        //将目标路径拼接完整
        $d_file_path.=DIRECTORY_SEPARATOR.basename($s_file_path);
        if (rename($s_file_path,$d_file_path) ) {
            echo '移动成功';
        }else{
            echo '移动失败';
        }
    }else{
        //展示
        //查找当前目录下的文件夹
        //打开当前的文件夹
        $dir_path=dirname($s_file_path);
        $dir=opendir($dir_path);
        $dir_path_arr=null;
        while ($file_name=readdir($dir)) {
            if ($file_name=='.') {
                continue;
            }
            $file_path=$dir_path.DIRECTORY_SEPARATOR.$file_name;
            if (is_dir($file_path)) {
                //找到的文件夹路径放到数组里
                $dir_path_arr[]=$file_path;
            }
        }
        closedir($dir);
        //让用户选择移动到哪里
        //使用下拉，将文件夹数组称此案给用户选择
        echo
        "<form action='homework.php?action=move_file' method='post' accept-charset='utf-8'>
                <input type='hidden' name='filepath' value='{$s_file_path}'>
                请选择移动文件夹
                <select name='d_file_path'>";
                foreach ($dir_path_arr as $value) {
                    echo "<option value='{$value}'>{$value}</option>";
                }

            echo"
            </select>
            <input type='submit' value='移动'>
            </form>";
    }
}
function del_dir($path){
//1.文件夹是否存在
    if (file_exists($path)) {
        //打开文件夹
        $dir=opendir($path);
        //遍历
        while ($file_name=readdir($dir)) {
            //过滤.和..
            if ($file_name=='.'||$file_name=='..') {
                continue;
            }
            //拼接完整的相对地址
            $file_path=$path.DIRECTORY_SEPARATOR.$file_name;
            if (is_file($file_path)) {
                $rs=unlink($file_path);
            }else{
                //删除文件夹
                $rs=del_dir($file_path);
            }
        }
        //关闭文件夹
        closedir($dir);
        //文件夹内的东西清空完毕-删除文件夹
        $rs=rmdir($path);
        return $rs;
    }
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
                height:1000px;
                margin: 0px auto;
                /* border: 1px red solid; */
            }
            .header{
                width:100%;
                height:10%;
                /* border: 1px red solid; */
                background-color:#99CCFF;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .content{
                width:100%;
                height:89.5%;
                /* border: 1px red solid; */
            }
            table{
                text-align:center;
                width:100%;
                height:100%;
                background-color:   #F8F8F8  ;
                border-spacing: 0px;
            }
            td{
                width:300px;
                height:20px;
                border-bottom:1px black solid;
            }
            button{
                background-color:   #E0E0E0 ;
            }
        </style>
    </head>
    <body>
        <!-- <form action="file_manage.php" method="post" enctype="multipart/form-data"> -->
            <!-- <div class="container">
                <div class="header"><h1>文件管理系统</h1></div>
                <div class="content"> -->

                    <!-- <table width="100%" rules="all">
                        <tr align="center">
                            <td>名称</td>
                            <td>修改日期</td>
                            <td>类型</td>
                            <td>大小</td>
                            <td>操作</td>
                        </tr>
                            <tr>
                                <?php
                                //     foreach ($dir_arr as $value) {
                                //     echo "<tr>";
                                //     echo '<td>'.$value[0].'</td>';
                                //     echo '<td>'.$value[1].'</td>';
                                //     echo '<td>'.$value[2].'</td>';
                                //     echo '<td>'.$value[3].'</td>';
                                //     echo '<td><a href="file_manage.php?action=check"><button>查看</button></a>
                                // <a href="file_manage.php?action=edit"><button>编辑</button></a>
                                // <a href="file_manage.php?action=del"><button>删除</button></a>
                                // <a href="file_manage.php?action=upload"><button>上传</button></a>
                                // <a href="file_manage.php?action=download"><button>下载</button></a></td>';
                                //     echo "</tr>";
                                ?>
                            </tr>
                    </table> -->
                <!-- </div>
                <div class="footer"></div>
            </div> -->
        <!-- </form> -->
    </body>

</html>