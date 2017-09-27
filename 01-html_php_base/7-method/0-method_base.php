
/**
 * @Author: WMQ
 * @Date:   2017-07-31 11:39:00
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-07-31 14:37:48
 */
//函数
//为了解决程序开发过程中，很多重复代码无法复用的问题，设计了，函数
//函数的目的，将重符的代码封装成一个方法，在需要的地方直接调用(不需要再写一遍)
//例子
//1.输入0-100以内的数
// for ($i=0; $i < 100 ; $i++) {
//     echo $i;
// }
//1.输入100-200以内的数---改代码
// for ($i=100; $i < 200 ; $i++) {
//     echo $i;
// }

//用到函数，相同的代码，封装到函数中
//函数的定义
// function (方法) 方法的名字(参数1,参数2){}


// 方法的功能，输出100-200之间的数
function showNum($begin,$end){
    for ($i=$begin; $i <$end ; $i++) {
    echo $i.'<br>';
    }
}
// 以后只要用到这个功能只需要调用这个方法
// 方法名的调用，语法：方法名();

echo'aaa<br>';
//showNum(0,100);//0-100
showNum(100,200);//100-200
function showAdd($a,$b){
    $c=$a+$b;
    echo $c;
}
showAdd(1,2);
//函数需要有一个结果返回出来

function add($a,$b){
    $d=$a+$b;
    //方法内部返回一个结果出去
    //默认方法都有返回结果，不写返回结果null
    return $d;
}
$a=add(11,22);
echo $a;
//命名
function _amethod(){

}
function amethod(){

}
function bmethod($var){

}
function cmethod($var){
    return true;
}
function test(){
    echo'<br/>我是test函数';
}
//不区分大小写
test();
TEST();
Test();

// function test(){
//     echo'<br>hello';
// }
//Fatal error: Cannot redeclare test() (previously declared in D:\wampstack-5.6.19-0\apache2\htdocs\7-method\0-method_base.php:68) in D:\wampstack-5.6.19-0\apache2\htdocs\7-method\0-method_base.php on line 77

// 函数命名是，规避系统已经存在的函数名
// function md5(){
//     echo'<br/>md5';
// }
function testReturn(){
    return true;
    return 1;
    return '我是字符串';
    return ['a','b','c'];
}
var_dump(testReturn());