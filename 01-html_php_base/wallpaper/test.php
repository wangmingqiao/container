<?php
/**
 * @Author: cancan
 * @Date:   2017-08-04 21:03:16
 * @Last Modified by:   cancan
 * @Last Modified time: 2017-08-05 15:50:55
 */
set_time_limit(0);

// for ($pageno = 1 ; $pageno < 22; $pageno ++) {
    // ini_set('user_agent','Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; .NET CLR 2.0.50727; .NET CLR 3.0.04506.30; GreenBrowser)');
function preg($a){
    for ($pageno = 1 ; $pageno < 3; $pageno ++) {
    ini_set('user_agent','Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; .NET CLR 2.0.50727; .NET CLR 3.0.04506.30; GreenBrowser)');
    $content = file_get_contents($a);
    $res = preg_match_all('{class="pic" href="([^"]+)}',$content,$arr);
    foreach ($arr[1] as $keys => $value) {
        // $value = ltrim($value,'/');
        $value = $value."\n";
        $a = rtrim($a, '/pc');
        // var_dump($a);
        // exit;

        file_put_contents('000.txt',"$a$value", FILE_APPEND);
    }
}
}

echo preg('http://desk.zol.com.cn/pc/');
// exit;

function tu($url)
{
    $content = file_get_contents($url);
    $res = preg_match_all('{srcs="([^"]+)"}',$content,$arr);
    foreach ($arr[1] as $keys => $value) {

        // $value = $value."\n";
        // file_put_contents('000.txt',"$a$value", FILE_APPEND);
        $img = file_get_contents($value);
        file_put_contents('./images/'.basename($value),$img);
    }
    ob_flush();
    return "偷图成功！！！！";
}

// if (preg('http://desk.zol.com.cn/pc/')) {
    $fileName = '000.txt';
    if (file_exists($fileName)) {
        // 打开文件
        $file = fopen($fileName, 'r');
        // fgets逐行读取文件
        // foreach ($file as $key => $value) {
        // var_dump($value);
        // }
        // exit;
        while ($url = fgets($file)) {
            // $url = ltrim(explode('=', $url)[1],'"') ;
            $url = rtrim($url);
            // var_dump($url);
            // exit;
            static $i = 0;
            $i++;
            // echo "<hr>[$i]";
            tu($url);
            // ob_flush();
            // sleep(1);
        }
        echo "404!!!!";
    }
 // }


