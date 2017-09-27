<?php
//数组的遍历

$a=['a','b','c','d','e','f'];
//使用h1标签修饰数组内的元素，并逐个打印输出
//建议使用循环结构
//如何动态的获取数组中元素的个数
var_dump(count($a));
echo "<br>";
for ($i=0; $i <count($a) ; $i++) { 
	var_dump($a[$i]);
}
echo "<hr>";

//二维数组的遍历
$a=['18888888','222@222.com'];
$b=['16666666','252@252.com'];
$c=[$a,$b];
//使用循环逐个遍历数组中的数据
for ($i=0; $i <count($c) ; $i++) { 
	$arr=$c[$i];
	for ($j=0; $j < count($arr); $j++) { 
		echo "<br>";
		echo $arr[$j];
	}
}
echo "<hr>";
//关联数组的遍历
$a=['name'=>'小王','age'=>25,'phone'=>'18425656122'];
//关联数组使用 foreach语句遍历
// $variable：需要遍历的关联数组
// $key=>$value:遍历的基本结构，以什么样的方式来遍历数组
// foreach ($variable as $key => $value) {
// 	# code...
// }
foreach ($a as $key => $value) {
	echo "key: $key &nbsp";
	echo "value:$value";
	echo "<br>";
}
echo "<hr>";
// 结构 foreach ($* as $*) {}//只会输出值
foreach ($a as $value) {
	echo $value;
	echo "<br>";
}
//只有结构 foreach ($* as $*=>$*) {}//才会输出索引和值的结构
?>