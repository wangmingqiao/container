<?php
/**
 * @Author: WMQ
 * @Date:   2017-08-07 21:35:49
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-08-08 09:50:41
 */
//检测代码的有效行
//1.读文件
//2.检测每行

$file_name='4-file_rw.php';
$fileArr=file($file_name);
$k_line=$code_line=$node_line=0;
$isNode=false;
foreach ($fileArr as $line) {
    //单行 // #
    //多行 /**/
    if (preg_match('#^((//)|\#)#',trim($line))) {//单行
        $node_line++;
    }elseif (preg_match('#^/\*#',trim($line))||$isNode) {//多行
        $isNode=true;
        if (preg_match('#\*/$#',trim($line))) {
            $isNode=false;
        }
        $node_line++;
    }
    elseif(trim($line)==''){//空行
        $k_line++;
    }else{//代码
        $code_line++;
    }
}
echo "注释:{$node_line} 空行:{$k_line} 代码:{$code_line}";