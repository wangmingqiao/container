<?php
$name='小王';
$age=22;
$company='taobao';
$tel='12345678910';
$eamil='aaa@sina.com';

//数组-容器数据类型
// 将数据打包成一个变量，进行传递
//如何创建一个数组
//1.使用[]修饰来创建一个数组
$arr=[$name,$age,$company,$tel,$eamil];
//只要是数组，用var_dump来输出
var_dump($arr);
echo "<hr>";
//2. array()方式来创建数组
$arr=array($name,$age,$company,$tel,$eamil);
var_dump($arr);

//3.索引数组，往数组中添加数据时，会自动给数据添加索引
// 索引的值从0开始，按照数据添加的顺序自动增加

//索引可以干什么？
//提取数组中的数据
echo "<hr>";
$str=$arr[3];
var_dump($str);
//修改数据中的数据
echo "<hr>";
$arr[0]='小明';
var_dump($arr);
echo "<hr>";

$arr[0]='';
var_dump($arr);
echo "<hr>";

//unset释放能量  isset检测变量是否为空
unset($arr[0]);
var_dump($arr);
echo "<hr>";

//练习：写一个数组用来存放学生的基本信息
// 基本信息包括：姓名 学号 年龄 专业
//要求至少包含10名同学的信息
$name='没咯';
$xuehao='************';
$age=21;
$zhuanye='PHP';
$arr=[$name,$xuehao,$age,$zhuanye];
var_dump($arr);
echo "<br>";

$arr[0]='小贝';
$arr[1]='6655656565';
$arr[2]=12;
var_dump($arr);
echo "<hr>";

for ($i=0; $i < 10 ; $i++) {

	$name='aa'.$i;
	$age=$i;
	$zy='计算机'.$i;
	// $arr=[$name,$age,$zy];
	// $sArr[]=$name;
	// $sArr[]=$age;
	// $sArr[]=$zy;

	//单个学生的信息
	$sArr =[$name,$age,$zy];
	//将单个学生的信息放到总数组里
	$all_arr[]=$sArr;
}
echo "<br>";
var_dump($all_arr);

echo "<br>". $all_arr[9][2];


//新的赋值方式
// $a[]='a';
// $a[]='b';
// $a[]='c';
// $a[]='d';
// $a[]='f';
// $a[]='g';
// $a[]='h';
// $a[]='i';
// $a[]='j';
// $a[]='k';
// var_dump($a);

//关联数组
//关联数组：他的索引可以是任意类型的值，由程序员自定义添加
// 索引数组：它的索引是int由系统自动添加
echo "<hr>";
$student_arr=['name'=>'小王',
			  'age'=>22,
			  'zy'=>'计算机'];
var_dump($student_arr);
//问题，如何获得数组中 名字这个数据
echo "<br>";
$a=$student_arr['name'];
var_dump($a);
?>