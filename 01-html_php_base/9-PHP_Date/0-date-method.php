<?php
/**
 * @Author: WMQ
 * @Date:   2017-08-02 10:11:20
 * @Last Modified by:   WMQ
 * @Last Modified time:
 */
echo '<br>'.date_default_timezone_get();
date_default_timezone_set('Asia/Shanghai');
date_default_timezone_set('PRC');//People's Republic of China 中华人民共和国

echo date(DATE_RFC2822);
echo '<hr>';
//时间的显示，date()函数，对时间戳进行格式化
//时间戳 time() 19700101~当前时间的秒数
echo'<br>'.time();
echo '<hr>';

echo'<br>'. date('Y--m--d H:i:s',time());//2017-08-02 11:36:25
//2017--08--02 10:26:00
//格式化符号
//d 月份中的天 显示:01,02,03
//j 天显示：1,2,3,4
//S 天英文的后缀,例:st,nd, rd
//z 年中的第几天 0-365
echo '<hr>';

echo '<br>'.date('d');//02
echo '<br>'.date('j');//2
echo '<br>'.date('S');//nd
echo '<br>'.date('z');//213
echo '<hr>';

//--星期
//D 星期中的第几天,英文的前三个字母 例:Mon-Sun
//l 星期几,完整的英文 例:Sunday
//w 星期中的第几天,数字(0-6) 例:0周日
//N.... 数字(1-7) 例:1周一
//W 年份中的第几周,例:23 23周

echo '<br>'.date('D');//Wed
echo '<br>'.date('l');//Wednesday
echo '<br>'.date('w');//3
echo '<br>'.date('N');//3
echo '<br>'.date('W');//31
echo '<hr>';

//月--
//F 月的完整单词
//M 月份三个字的缩写
//m 数字月份 自动补零
//n 数字月份 不自动补零
//t 当前月份的天数

echo '<br>'.date('F');//August
echo '<br>'.date('M');//Aug
echo '<br>'.date('m');//08
echo '<br>'.date('n');//8
echo '<br>'.date('t');//31
echo '<hr>';

// 年--
// Y 4位的数字年份
// y 2位的数字年份
// L 判断是否是闰年 1 闰年 0 非闰年
// o 和 Y 相等
echo '<br>'.date('Y');//2017
echo '<br>'.date('y');//17
echo '<br>'.date('L');//0
echo '<br>'.date('o');//2017
echo '<hr>';

//时间
//时，分，秒
//上午 下午
//a am/pm
//A AM/PM

// 小时
// g 小时 12时格式 不补零
// G 小时 24时格式 不补零
// h 小时 12时格式 补零
// H 小时 24时格式 补零
echo '<br>'.date('g a',time()-2*3600);//9 am
echo '<br>'.date('G a');//11 am
echo '<br>'.date('h a',time()-2*3600);//09 am
echo '<br>'.date('H');//11
echo '<hr>';

//分
//i 分钟 补零
//秒
//s 秒 补零

//练习：使用正确的格式化符号，显示出下列格式的时间字符串
//1,Wednesday is the 28th
echo '<br>'.date('l \i\s \t\h\e jS');
//2,December 28,2016,11:09,am
echo '<br>'.date('F d,Y,H:m,a');
//3,2016-12-28 11:10:02
echo'<br>'. date('Y-m-d h:i:s');
//4,Dec Wed 28 11:11:02 CST +0800
echo '<br>'.date('M D j h:i:s e O');
//5,it is the 28th
echo'<br>'.date('\i\t \i\s \t\h\e jS');
echo '<hr>';

//让特殊符号没有意义可以使用\转义符号
//strtotime--将字符串转换成时间
echo '<br>'.date('c',time()-24*3600);
$timestape=strtotime('-1 day');
echo '<br>'.date('r',$timestape);

//+1 day
//week
//month
//next monday 下周一
//last Thursday 上周四

$timestape=strtotime('+2 week 2 days 2 hours');
echo '<br>'.date('c',$timestape);

$timestape=strtotime('next monday');
echo '<br>'.date('c',$timestape);

//mktime 取得时间的时间戳
//参数:时,分,秒,月,日,年 夏时令
//使用mktime获得一个固定时间的时间戳
$timestape=mktime(8,8,8,8,8,2018);
echo '<br>'.date('c',$timestape);

//传少值的情况，会根据当前的情况去修改
$timestape=mktime(8,8);
echo '<br>'.date('c',$timestape);

//得到时间的详细信息
//参数是时间戳，不传得到当时时间，传时间戳得到时间戳的具体信息
$dateArr=getdate();
echo '<hr>';
var_dump($dateArr);
echo '<hr>';

// 获得时间的详细信息能得到微秒
$time=gettimeofday(true);
var_dump($time);

//获取微秒
echo'<br>微秒'.microtime(true);

//检测时间的真实性
$res=checkdate(2, 29, 2016);
if ($res) {
    echo'<br>有这一天';
}else{
    echo'<br>没有这一天';
}


//功能
//刚刚
//五分钟前
//一个小时之内显示多少分钟之前
//一天之内 显示多少小时多少分钟之前
//一个月之内，显示几天前
//几个月之前
//显示正常的时间格式

// 需要写一个函数：参数：时间
