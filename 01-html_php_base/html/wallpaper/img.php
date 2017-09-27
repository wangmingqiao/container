<?php

//从根网站获取所有的相册url
//@param http://desk.zol.com.cn/pc/
//@return array()
set_time_limit(0);
ini_set('user_agent','Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; .NET CLR 2.0.50727; .NET CLR 3.0.04506.30; GreenBrowser)');


function getAll($url){
    //$allUrl存放所有的页面
    $imagesUrl = array();
    $allImgUrl = array();
    $file = 'imagesUrl.txt';
    for($page=1;$page<=379;$page++){
        $allUrl = $url.$page.".html";
        //获取单个页面所有的大图url
        $regex = '#<a class="pic" href="([^");]+)"#';
        $content = file_get_contents($allUrl);
        preg_match_all($regex,$content,$imagesUrl);
        foreach ($imagesUrl[1] as $value) {
           $bigImagePath = absolutePath($value);
           //获取所有下载链接
           getBigImageUrl($bigImagePath);
           }
        }
    }

getAll("http://desk.zol.com.cn/pc/");




//下载图片
//@param http://desk.fd.zol-img.com.cn/t_s960x600c5/g5/M00/01/0E/ChMkJlbKwXGIC_PPAAUo_Q8w_ngAALGYQNJtGQABSkV753.jpg
//@return bool
function downloadImg($url){
    $filename = date("Ymd");
    if(!file_exists("./catch/$filename")){
        mkdir("./catch/$filename");
    }
    $imgInfo = pathinfo($url);
    // var_dump($imgInfo);
    $path = "./catch/$filename/".$imgInfo['basename'];
    echo $path;
    $bool = copy($url,$path);
    return $bool;
}
// downloadImg("http://desk.fd.zol-img.com.cn/t_s960x600c5/g5/M00/01/0E/ChMkJlbKwXGIC_PPAAUo_Q8w_ngAALGYQNJtGQABSkV753.jpg");


//获取大图下载地址
//@param http://desk.zol.com.cn/bizhi/187_624_2.html
//@return  array()  http://desk.fd.zol-img.com.cn/t_s960x600c5/g5/M00/01/0E/ChMkJlbKwXGIC_PPAAUo_Q8w_ngAALGYQNJtGQABSkV753.jpg
function getBigImageUrl($bigImgsUrl){

    $bigImgInfo = file_get_contents($bigImgsUrl);
    //判断是否是大图
    $bigImgRegex = '#<img id="bigImg" src="([^";)]+)"#';
    preg_match($bigImgRegex,$bigImgInfo,$bigImgArr);

     $pic_url = $bigImgArr[1];
     downloadImg($pic_url);
     sleep(1);
     $pic_url .= "\n";
     file_put_contents("img_url.txt",$pic_url,FILE_APPEND);




    //判断是否有下一张
     $nextRegex = '#<a id="pageNext" class="next" href="([^";)]+)"#';
     $bigContent = file_get_contents($bigImgsUrl);
     preg_match_all($nextRegex,$bigContent,$nextArr);
     $nextExists = $nextArr[1];

    if(count($nextExists)!=0){
        $nextPage = absolutePath($nextExists[0]);
        getBigImageUrl($nextPage);
    }
}

//相对路径转化为绝对路径
function absolutePath($url){
    $path = "http://desk.zol.com.cn".$url;
    return $path;
}


// getBigImageUrl('http://desk.zol.com.cn/bizhi/7129_88242_2.html');
