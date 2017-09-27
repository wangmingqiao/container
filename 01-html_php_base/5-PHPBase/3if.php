<?php
/**
 * @Author: WMQ
 * @Date:   2017-07-27 15:06:19
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-07-27 18:57:29
 */

// 条件语句
// 不同的条件，处理不同的代码

// 网吧  18岁
$age=17;
//if  的条件是用来判断真假的
if ($age>=18)
    echo "可以上网";


//if...else...
if ($age>=18) {
    echo "可以LoL";
}else{
    echo "回家王者";
}
echo "<hr>";


$week ='周一';//可能有周一----周日

//使用 比较+逻辑运算符
//输出，周一到周五，上课
//周六，周日，睡觉

if ($week=='周六' || $week=='周日') {
    echo "不需要上课，睡觉去！";
}else{
    echo "你需要去上课！！！";
}

echo"<hr>";
//周一到周六每一天都有不同的欢迎语
//if...elseif...
$week='周一';

if ($week=='周一') {
    echo'每周的开始';
}elseif ($week=='周二') {
    echo "很高兴再次见面！";
}elseif($week=='周三'){
    echo"每周过度日！";
}elseif($week=='周四'){
    echo"终于等到周四了";
}elseif($week=='周五'){
    echo"双休日要开始了，心情棒棒的";
}else{
    echo "双休日中";
}
echo "<hr>";

//练习
//if...elseif...else
//1.有两个数
//2.如多都是证，输出两数差
//3.如果一正一负，输出和
//4.其他情况输出，两个数的值

$a=9;
$b=8;
if ($a>0 && $b>0) {
    echo $a-$b;
}elseif(($a > 0 && $b < 0)||($a < 0 && $b > 0)){
    echo $a+$b;
}else{
    echo "a:".$a,"b:".$b;
}
echo "<hr>";

//if 嵌套
//周一到周六 ，每天根据用户的性别显示不同的欢迎语
$sex='man';//woman
$week='周一';
if ($sex='man') {
    if ($week=='周一') {
        echo "周一欢迎您";
    }elseif($week=='周二'){
        echo "周二欢迎您";
    }elseif($week=='周三'){
        echo "周三欢迎您";
    }elseif($week=='周四'){
        echo "周四欢迎您";
    }elseif($week=='周五'){
        echo "周五欢迎您";
    }elseif($week=='周六'){
        echo "周六欢迎您";
    }
}else{
    if ($week=='周一') {
        echo "很高兴见到你";
    }elseif($week=='周二'){
        echo "欢迎回来";
    }elseif($week=='周三'){
        echo "欢迎回家";
    }elseif($week=='周四'){
        echo "家园欢迎您";
    }elseif($week=='周五'){
        echo "见到你很开心";
    }elseif($week=='周六'){
        echo "您辛苦了";
    }
}
echo '<hr>';

//switch
$week='周四';

switch ($week) {
    case '周一':
        echo 1;
        break;
    case '周二':
        echo 2;
        break;
    case '周三':
        echo 3;
        break;
    case '周四':
        echo 4;
        break;
    case '周五':
        echo 5;
        break;
    default:
        break;
}
echo '<hr>';

//百货大楼
//1.2电脑
//3.4.智游
//5.6.网吧

$floor=1;
switch ($floor) {
    case 1:
    case 2:
        echo '电脑';
        break;
    case 3:
    case 4:
        echo '智游';
        break;
    case 5:
    case 6:
        echo '网吧';
        break;

    default:
        # code...
        break;
}
echo '<hr>';


//为什么要有循环
//机器重复的执行某一操作
//输出0-100每一个数
//循环结构
//死循环:根本停不下来(循环的条件恒成立)
// while(循环的条件){
//     echo'';
// }

// 循环语句，需要注意3个地方：1.结束的条件 2.循环的动力 3.循环的开始
$a=0;
while ( $a < 10) {
    $a++;
    echo $a.'<br>';
    //1
    //2
    //3
    //4
    //5
    //6
    //7
    //8
    //9
    //10
}
echo "<hr>";
//while 先判断条件再执行
//do...while... 先执行再判断条件
$a=0;
do {
    echo ++$a.'<br>';
}while ($a<100);
echo "<hr>";

//for
for ($i=0; $i < 10; $i++) {
    echo $i.'<br>';
}
//循环嵌套
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
</head>
<body>
    <table rules="all" border="1">
        <?php
            for ($i=1; $i <= 9 ; $i++) {
                echo "<tr>";
                    //写列
                    for ($j=1; $j <=$i ; $j++) {
                        $a=$i*$j;
                        // echo "<td>{$i}×{$j}=$c</td>";
                        echo"<td style='padding:5px;font-size:10px;'>{$i}&times;{$j}={$a}</td>";
                       }
                "</tr>";
            }
        ?>

    </table>

</body>
</html>