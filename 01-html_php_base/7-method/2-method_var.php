 <?php
/**
 * @Author: WMQ
 * @Date:   2017-07-31 16:09:59
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-08-01 21:17:29
 */
// 作用域
function test(){
    // 在方法体声明的，局部变量
    // 作用域：方法体，出了作用域就被释放了
    $a='abc';
}
// echo $a;
//Notice: Undefined variable: a in D:\wampstack-5.6.19-0\apache2\htdocs\7-method\2-method_var.php on line 14

//静态变量
function test_static(){
    static $i=1;//初始化:只初始化一次
    echo '<br>'.$i;
    $i++;
}
test_static();//1
test_static();//2
test_static();//3
test_static();//4

// 全局变量
$a='abc';
function test_global(){
    $a='aaa';
}
test_global();
echo $a;//abc

//全局变量，作用域是整个脚本
//全局变量不可以直接在方法体中使用
//想在方法体内使用全局变量需要添加关键字 global;
$b='abc';
// function test_global_b(){
//     global $b;//告诉方法体，这个$b是全局的$b
//     $b='bbb';
// }
function test_global_bb(){
    global $b,$a;
    $b='bbbbb'.$a;
}
// test_global_b();
test_global_bb();

echo '<br>'.$b;