<?php
/**
 * @Author: WMQ
 * @Date:   2017-08-30 19:42:28
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-08-30 21:13:45
 */

//页面跳转
function jump($msg,$url){
    header("refresh:1;url=$url");
    exit($msg);
}

//失败,重新点击
function error_option($url){
    exit("操作失败，请 <a href='{$url}'>重新来过</a>...");
}


//分页处理
function page_option($action,$total_count,$page_limit,$current_page){

    //总页数
    $total_page = ceil($total_count/$page_limit);

    //计算,数据库查询的起始位置
    $begin_num = ($current_page-1)*$page_limit;

    //首页
    $first_page = $_SERVER['SCRIPT_NAME']."?action=$action"."&page=1";
    //尾页
    $last_page = $_SERVER['SCRIPT_NAME']."?action=$action"."&page=$total_page";

    //上一页
    $pre_page = $_SERVER['SCRIPT_NAME']."?action=$action"."&page=".(($current_page-1)<=0?1:$current_page-1);
    //下一页
    $next_page = $_SERVER['SCRIPT_NAME']."?action=$action"."&page=".(($current_page+1)>=$total_page?$total_page:$current_page+1);


    return array('first_page'=>$first_page,
            'last_page'=>$last_page,
            'pre_page'=>$pre_page,
            'next_page'=>$next_page,
            'total_page'=>$total_page,
        'begin_num'=>$begin_num);
}
