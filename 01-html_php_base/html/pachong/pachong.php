<?php
/**
 * @Author: WMQ
 * @Date:   2017-08-03 21:07:23
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-08-04 10:00:43
 */
// 1.获取网页的内容
set_time_limit(0);//不限时
$content=file_get_contents('http://www.hao123.com');
// 2.正则网页里的img的url
$regex='#src="[^");]+[^s]#';
// 3.将正则出的结果写入本地
$resArr=array();
$res=preg_match_all($regex,$content,$resArr);
if ($res) {
    $urls=current($resArr);//取到数组第一个位置的数据
    foreach ($urls as $key=>$value) {
        // var_dump($urls);exit;
        // echo $value;exit;
        $value=ltrim($value,'src="');
        $value=rtrim($value,'"');
        $value=$value."\n";
        //追加写入文件
        copy($value,"images/".$key.'.jpg');
        file_put_contents('url.txt',$value,FILE_APPEND);
    }
    ob_flush();//清除缓存输出
}