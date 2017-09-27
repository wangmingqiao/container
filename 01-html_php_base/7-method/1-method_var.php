<?php
/**
 * @Author: WMQ
 * @Date:   2017-07-31 14:40:29
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-07-31 15:41:13
 */
//参数

function showMsg($userMsg){
    echo '<br />用户输入'.$userMsg;
}
//丢失了一个内容
//Warning: Missing argument 1 for showMsg(), called in D:\wampstack-5.6.19-0\apache2\htdocs\7-method\1-method_var.php on line 13 and defined in D:\wampstack-5.6.19-0\apache2\htdocs\7-method\1-method_var.php on line 10

//没有定义参数，说明参数是必须的
//Notice: Undefined variable: userMsg in D:\wampstack-5.6.19-0\apache2\htdocs\7-method\1-method_var.php on line 11

showMsg('aaa');
//如何划分可选和必选
//1.参数是否有默认值
//2.如果参数有默认值那么这个参数就是可选参数
//3.如果没有默认值，这个参数就是必选参数
function showMsg_var($userMsg='hello'){
    echo '<br />用户输入'.$userMsg;
}
showMsg_var('bbbbbb');
showMsg_var();
//练习：声明一个函数计算两个数的绝对值(两数的距离)，参数是可选的
function custom_abs($a=0,$b=0){
    if ($a>$b) {
        return $a-$b;
    }else {
        return $b-$a;
    }
}
echo '<br>'.custom_abs(1,5);
//练习：声明一个函数，功能动态的获得一个table 参数 rows cols 可选参数：table的背景颜色
function creattable($rows=0,$clos=0,$bgcolor='cyan'){
    echo"<table border='1' bgcolor='$bgcolor'>";
    for ($i=1; $i <=$rows ; $i++) {
        echo '<tr>';
            for ($j=1; $j <=$clos ; $j++) {
                echo '<td>&nbsp;</td>';
            }
        echo'</tr>';
    }
    echo "</table>";
}
creattable(3,3);
?>