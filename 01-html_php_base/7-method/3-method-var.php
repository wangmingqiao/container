<?php
/**
 * @Author: WMQ
 * @Date:   2017-07-31 16:35:15
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-07-31 20:31:18
 */
//引用传值
$a=1;
function test($a){
    $a++;
    // echo $a;
}
test($a);
echo $a.'<br>';//1
// 引用传值 本质，变量将自己的地址传给了函数，函数拿到变量的地址，就可以随意修改变量的地址
function test_1(&$a){
    $a++;
    // $a=['a','b','c'];//拿到地址，修改变量的类型都可以
}
test_1($a);
echo '<br>'.$a.'<br>';//2
//声明一个方法，有两个参数，方法的功能调换两个参数的值
//$a=1;$b=2;
//method($a,$b);
//echo $a;//2
//echo $b;//1

$a=1;
$b=2;
function method_a(&$a,&$b){
   $c=$a;
   $a=$b;
   $b=$c;
}
method_a($a,$b);
echo $a,$b;

$x='a';
$y='b';
method_a($x,$y);
echo '<br>'.$x.'----'.$y;

function say(){
    echo'<br>你好';
}
function hello(){
    echo'<br>hello';
}
function nihao(){
    echo'<br>nihao';
}
//变量的值是函数名
$method='say';
$method();

function play(){
    echo'开始播放音乐';
}
function stop(){
    echo'停止';
}
function pause(){
    echo '暂停';
}
$ex='play';
$ex();
//匿名函数
$a=function(){
    echo '<br>我是匿名函数';
};
$a();

//递归函数
//例子：定义方法，有一个参数 $n=3 输出：3 2 1 0 - 0 1 2 3
//参数是n 输出 n-0 0-n
function test_d($n){
    echo $n;
    if ($n>0) {
        test_d($n-1);
    }else{
        echo '-';
    }
    echo $n;
}
test_d(3);

// $n=5;
// while ( $n>= 0) {
//     echo $n;
//     $n--;
//     if ($n==0) {
//         break;
//     }
// }
//递归函数
//输出0-10的数
function showNum($num){
    echo '<br>'.$num;
    $num++;
    if ($num>10) {
        echo'结束';
    }else {
        showNum($num);
    }
}
showNum(0);
// function showNum($num){
//     echo '<br>'.$num;
//     $num++;
//     if ($num>10) {
//         echo'结束';
//     }else {
//         echo '<br>'.$num;
//         $num++;
//         if ($num>10) {
//             echo'结束';
//             }else{
//                 echo '<br>'.$num;
//                 $num++;
//                 if ($num>10) {
//                     echo'结束';
//                 }
//             }
//         }
// }

//递归练习;1+2+3+4+...+n的值
//参数n
echo'<hr>';
function num_test($n){
    if ($n==1) {
        return 1;
    }else{
        return $n+num_test($n-1);
    }
}
echo num_test(5);
echo'<hr>';

function sum($n){
    static $sum=0;
    if($n>=0){
        $sum += $n;
        sum(--$n);
    }
    else{
        echo $sum;
    }

}

// function sum1($n){
//     static $sum=0;
//     if($n>=0){
//         $sum += $n;
//         sum1(--$n);
//     }else{
//         if($n>=0){
//             $sum+=$n;
//             sum1(--$n);
//         }else{
//             if($n>=0){
//                 $sum+=$n;
//                 sum1(--$n);
//             }else{
//                 echo $sum;
//             }
//         }
//     }

// }

sum(2);
//十进制转换成二进制
function sum_2($n){
    if ((int)$n==0) {
        return;
    }else{
        sum_2($n/2);
        echo $n%2;
    }
}
sum_2(10);