<?php
/**
 * @Author: WMQ
 * @Date:   2017-08-07 20:28:16
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-08-08 09:14:55
 */
$handle = fopen("index.php","r");
$total = 0;//总行数
$space = 0;//空行数
$notes = 0;//注释
$isNotes = false;
// feof() 函数检测代码总行数是否已到达文件末尾
while(!feof($handle)){
    // fgets（）从文件指针中读取一行
    $line = fgets($handle);
    $line = htmlentities($line);
    $total++;
    if($isNotes){
        $notes++;
        if(preg_match("/.*(\*\/)/",$line)){
        //多行*/注释结束
            $isNotes = false;
        }
        // 在循环结构用用来跳过本次循环中剩余的代码并在条件求值为真时开始执行下一次循环。
        continue;

    }
    if(preg_match("/^[\s]*$/",$line)){
    //空行
        $space++;
    }elseif(preg_match("/^[\s]*\/\//",$line)){
    //两杠注释
        $notes++;
    }elseif(preg_match("/^[\s]*(\/\*).*(\*\/)[\s]*$/",$line)){
    //单行注释
        $notes++;
    }elseif(preg_match("/^[\s]*(\/\*).*/",$line)){
    //多行/*注释开始
        $notes++;
        $isNotes = true;
    }
}
echo "全部行数:".$total.'<br />';
echo "空行数:".$space.'<br />';
echo "注释行数:".$notes.'<br />';