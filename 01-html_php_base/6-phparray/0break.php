<?php
/**
 * @Author: WMQ
 * @Date:   2017-07-28 09:15:50
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-07-28 10:48:40
 */
// 特殊的流程控制
// break continue
// goto
// exit：die

//break 终止 终断
for ($i=0; $i < 10 ; $i++) {
    //在i=5中断循环
    if ($i==5) {
        break;//跳过了整个剩余的循环
    }
     echo $i;
}
echo "<hr>";

//continue
for ($i=0; $i < 10 ; $i++) {
    if ($i==5) {
        continue;//跳过了一次循环
    }
    echo $i;
}
echo "<hr>";

//用到continue 输出0-10内3的倍数

for ($i=0; $i <= 10 ; $i++) {
    if ($i%3!=0||$i==0) {
        continue;
    }
    echo $i;
}

echo "<hr>";
//goto 跳转到被指定的位置，执行代码
for ($i=0; $i < 10 ; $i++) {
    if ($i==5) {
        goto mycoad;
    }
    echo $i;
}
echo "循环执行结束";

mycoad:

echo "循环没有结束，被跳出";
goto next;
echo "循环没有结束，被跳出1";
echo "循环没有结束，被跳出2";
echo "循环没有结束，被跳出3";

next:
echo "循环没有结束，被跳出4";

//exit die
//相同：结束当前的脚本
//die结束时可以同时输出语句

echo "<hr>";
echo '脚本未结束1';
die('我的脚本结束啦');
echo '脚本未结束2';
echo '脚本未结束3';
echo '脚本未结束4';
echo '脚本未结束5';
echo '脚本未结束6';