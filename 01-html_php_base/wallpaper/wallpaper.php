<?php
/**
 * @Author: WMQ
 * @Date:   2017-08-04 22:32:05
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-08-08 15:46:53
 */
set_time_limit(0);
function read($a)
{
    for ($pageno = 1 ; $pageno <2; $pageno ++) {
    ini_set('user_agent','Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; .NET CLR 2.0.50727; .NET CLR 3.0.04506.30; GreenBrowser)');
    // 将整个文件读入一个字符串
    $content = file_get_contents($a.$pageno.'.html');
    // 2,正则网页里面的url
    $regex = '{class="pic" href="([^"]+)"}';
    // 3,将正则出的结果写入本地
    preg_match_all($regex, $content, $resArr);
    foreach ($resArr[1] as $value) {
            $value = $value."\n";
            $a = rtrim($a, '/pc');
            //追加写入文件
            $url=$a.$value;
            BigImageUrl($url);
      // file_put_contents('001.txt',"$a$value", FILE_APPEND);
            }
            return "123";
        }
}
echo read('http://desk.zol.com.cn/pc/');


// function load($url)
// {
//     $content = file_get_contents($url);
//     preg_match_all('{srcs="([^"]+)}', $content, $resArr);
//     foreach ($resArr[1] as $value) {
//         $img=file_get_contents($value);
//         //追加写入文件
//         //basename返回路径中文件名部分
//         file_put_contents('./images/'.basename($value),$img);
//      }
//         ob_flush();
//         return "321";
// }
function BigImageUrl($bigUrl){
    $content=file_get_contents($bigUrl);
    preg_match_all('#<img id="bigImg" src="([^";)]+)"#',$content,$resArr);
    foreach ($resArr[1] as $value) {
        $img=file_get_contents($value);
        // file_put_contents('.images/'.basename($value),$img);
      file_put_contents('002.txt',$img, FILE_APPEND);
    }




    $nextRegex = '#<a id="pageNext" class="next" href="([^";)]+)"#';
    preg_match_all($nextRegex,$content,$pagenext);
    $nextexist=$pagenext[1];
    if (count($nextexist)!=0) {
        $nextpage=read($nextexist[0]);
        BigImageUrl($nextpage);
    }
}

// if (getContent('http://www.hao123.com')) {
   $fileName = '002.txt';
    if (file_exists($fileName)) {
        // 打开文件
        //r只读方式打开，将文件指针指向文件头
        $file = fopen($fileName, 'r');
        // fgets逐行读取文件
        while ($url = fgets($file)) {
            $url = trim($url);
            // var_dump($url);
            // exit;
            static $i = 0;
            $i++;
            // echo "<hr>[$i]";
            // BigImageUrl($bigUrl);
            // ob_flush();
            // sleep(1);
        }
    }




//123string(47) "http://desk.zol.com.cn/bizhi/7131_88315_2.html "