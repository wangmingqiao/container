<?php
// 布尔类型
// 最简单的类型，布尔类型表达了真值，可以为true和false
// true和false大小写不区分
$a=TRUE;
$b=false;

// 一般情况下，bool的变量都是用来判断条件的
$isMan=false;
// if..else..  如果..或者..
if ($isMan) {
	// 如果条件是真值，会执行这个大括号的代码
	// 如果条件是假，不会执行大括号内的代码
	echo "性别是男";
}
else{
	echo "性别是女";
}



?>