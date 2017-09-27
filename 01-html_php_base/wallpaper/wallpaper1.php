<?php
/**
 * @Author: WMQ
 * @Date:   2017-08-04 22:32:05
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-08-08 15:21:30
 */
set_time_limit(0);

function read($a)
{
    for ($pageno = 2 ; $pageno <3; $pageno ++) {
    ini_set('user_agent','Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; .NET CLR 2.0.50727; .NET CLR 3.0.04506.30; GreenBrowser)');
    $content = file_get_contents($a);
// 2,正则网页里面的url
$regex = '{class="pic" href="([^"]+)"}';
// 3,将正则出的结果写入本地
preg_match_all($regex, $content, $resArr);
foreach ($resArr[1] as $value) {
        $value = $value."\n";
        $a = rtrim($a, '/pc');
        file_put_contents('001.txt',"$a$value", FILE_APPEND);
    }
    return "123";
}
}

echo read('http://desk.zol.com.cn/pc/

');

function load($url)
{
    $content = file_get_contents($url);
    preg_match_all('{srcs="([^"]+)}', $content, $resArr);
    foreach ($resArr[1] as $value) {
        $img=file_get_contents($value);
        file_put_contents('./images/'.basename($value),$img);

     }
        ob_flush();
        return "321";
}

// if (getContent('http://www.hao123.com ')) {
   $fileName = '001.txt';
    if (file_exists($fileName)) {
        // 打开文件
        $file = fopen($fileName, 'r');
        // fgets逐行读取文件
        while ($url = fgets($file)) {
            $url = trim($url);
            // var_dump($url);
            // exit;
            static $i = 0;
            $i++;
            echo "<hr>[$i]";
            load($url);
            // ob_flush();
            // sleep(1);
        }
    }
