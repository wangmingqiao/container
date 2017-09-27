<?php
//for循环
//0-10输出
//for （循环的开始；循环的结束；循环的动力）
for ($i=1; $i <=10 ; $i++) {
	echo "<br>$i";
}
echo "<hr>";
//循环也是可以嵌套的
// echo "*";
//第一个循环决定有几排
for ($i=0; $i < 5 ; $i++) {
	echo "<br>";
	//第二行循环决定每行有几个
	for ($j=0; $j <=$i ; $j++) {
		echo "*";
	}
}
echo "<hr>";

for ($i=1; $i <=9 ; $i++) {
	echo "<br>";
	for ($j=1; $j <=$i ; $j++) {
		$ji=$i*$j;
		echo "&nbsp";
		echo "$i*$j=$ji";
	}
}
echo "<hr>";
for ($i=9; $i >=1 ; $i--) {
	echo "<br>";
	for ($j=1; $j <=$i ; $j++) {
		$ji=$i*$j;
		echo "&nbsp";
		echo "$i"."*"."$j"."="."$ji";
	}
}
echo"<hr>";
//break 中断
for ($i=0; $i < 100; $i++) {
	echo $i;
	//在第五次循环的时候结束循环；
	if($i==5){
		break;
	}
}
echo "<hr>";
//continue 跳过单次循环
for($i=0;$i<10;$i++){
	if ($i==5) {
		continue;
	}
	echo "<br>".$i;
}
echo "<hr>";
