<?php
/**
 * @Author: WMQ
 * @Date:   2017-08-09 09:57:36
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-08-09 15:12:39
 */
//文件上传
//1.单文件上传
//2.多文件上传

// PHP配置，添加上传大小的限制
// php.ini
/*
开启文件上传
file_uploads=On
设置临时目录
uoload_tmp_dir=;
上传文件大小限制
upload_max_filesize=10M;
上传文件数量的限制
max_file_uploads=20;
post方式提交的最大数据限制(一班大于upload_max_filesize)
post_max_size=20M;

 */
// 通过表单提交的方式上传文件
// 需要注意：
// 1.表单的请求方式必须是post
// 2.需要用到input type=file
// 3.提交文件必须声明一个属性 enctype='multipart/form_data'(只有文件上传的时候才用)
// 4.添加一个隐藏的input MAX_FILE_SIZE 值 是字节

// $_POST 用来接收表单的数据
// $_FILES 接收文件信息
// var_dump($_POST);
// echo '<hr>';
// var_dump($_FILES);

//is_uploaded_file 检测是否是还是上传文件
//move_uploaded_file移动上传文件
//临时路径

if (isset($_FILES['pic'])) {
    $info=$_FILES['pic'];

    //name-tyoe-tmp_name-size-error
    $arrs=array();
    foreach ($info as $key => $value) {
        if (is_array($value)) {
            $i=0;
            foreach ($value as $att_key => $att_value) {
                $arrs[$i][$key]=$att_value;
                $i++;
            }
        }
    }
    var_dump($info);
    echo '<hr>';
    var_dump($arrs);
    foreach ($arrs as $file_info) {
        verify_upload($file_info);
    }
}
//验证上传信息
function verify_upload($file_info){
    if ($file_info['error']>0) {
        $error_no=$file_info['error'];
        /*
        错误代码
        UPLOAD_ERR_INI_SIZE 值：1
        超过了php.ini中设置的upload_max_filesize的限制值
        UPLOAD_ERR_FORM_SIZE 值：2
        上传的文件大小超过了form表单中这只MAX_FILE_SIZE的限制值
        UPLOAD_ERR_PARTIAL 值：3
        文件部分上传，没有上传完
        UPLOAD_ERR_NO_FILE 值：4
        没有文件被上传
         */
        switch ($error_no) {
            case UPLOAD_ERR_INI_SIZE:
                echo'文件超过ini配置限制';
                break;
            case UPLOAD_ERR_FORM_SIZE:
                echo'文件超过form配置限制';
                break;
            case UPLOAD_ERR_PARTIAL:
                echo'文件上传一部分';
                break;
            case UPLOAD_ERR_NO_FILE:
                echo'没有文件';
                break;
            default:
                echo'未知错误';
                break;
            }
        return;
    }
    //大小限制
    $file_size=$file_info['size'];
    $max_size=5000000;
    if ($file_size>$max_size) {
        echo '文件超过最大限制';
        return;
    }

    //类型限制
    $file_type=$file_info['type'];
    //获得数组中的最后一个元素
    $types=explode('/',$file_type);
    $file_type=end($types);
    // 得到的类型是mime类型 image/png inage/jpeg
    $mimeTypes=['png','jpeg','gif','jpg'];
    if (!in_array($file_type,$mimeTypes)) {
        echo'类型不对';
        return;
    }

    //处理上传文件
    $upload_dir='./uoload';
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir);
    }

    //处理唯一的文件名  时间戳+随机数
    $file_name=time().rand(1,999).'.'.$file_type;

    //获得文件的完整路径
    $file_path=$upload_dir.DIRECTORY_SEPARATOR.$file_name;

    //处理上传的文件
    $tmp_path=$file_info['tmp_name'];
    //临时文件，会在PHP代码执行完毕后自动清除
    if (is_uploaded_file($tmp_path)) {
        if (move_uploaded_file($tmp_path,$file_path)) {
            echo '成功';
        }else{
            echo '失败';
        }
    }else{
        echo '这不是一个完整的上传文件';
    }
}


