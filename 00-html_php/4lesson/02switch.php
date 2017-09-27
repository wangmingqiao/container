<?php
//需求，商场导购，告诉用户每一楼层具体卖什么
//用户只需要输入楼层号
//获取表单提交数据
//1.判断是否有数据
$floor=0;
if (isset($_POST['floor'])) {
	$floor=(int)$_POST['floor'];
}
if ($floor>0) {
	//写逻辑：1,2：珠宝 3,4：电器 5,6：服装 7：游乐场 8：美食
	//确定一个变量不停变换，可以用switch语句来捕获变换
	switch ($floor) {
		case 1:
		case 2:
			echo "<br>珠宝";//中断switch语句
			break;
		case 3:
		case 4:
			echo "<br>电器";
			break;
		case 5:
		case 6:
			echo "<br>服装";
			break;
		case 7:
			echo "<br>游乐场";
			break;
		case 8:
			echo "<br>美食";
			break;
		default:
			echo "<br>没有该楼层，请重新输入。";
			break;
	}
}
//练习：电脑通过不同指令，执行不同任务
//0：关机 1:开机 2：注销 3：重启 4：休眠
//switch语句

//switch变种：不写break
//计算本周还剩余哪几天
$week='Thursday';
switch ($week) {
	case 'Monday':
		echo "<br>星期一";
	case 'Tuesday':
		echo "<br>星期二";

	case 'Wednesday':
		echo "<br>星期三";

	case 'Thursday':
		echo "<br>星期四";

	case 'Friday':
		echo "<br>星期五";

	case 'Saturday':
		echo "<br>星期六";
	
	default:
		# code...
		break;
}




$digital=0;
if (isset($_POST['digital'])) {
	$digital=(int)$_POST['digital'];
}
if ($digital>=0) {
	switch ($digital) {
		case 0:
			echo "<br>关机";
			break;
		case 1:
			echo "<br>开机";
			break;
		case 2:
			echo "<br>注销";
			break;
		case 3:
			echo "<br>重启";
			break;
		case 4:
			echo "<br>休眠";
			break;	
		default:
			echo "<br>该数字键没有设置快捷功能";
			break;
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>商场导购</title>
</head>
<body>
	<!-- action提交的位置就是你的处理逻辑的php文件名字 -->
	<!-- method http的post请求方法 -->
	<form action="02switch.php" method="post">
		<label>输入楼层</label>
		<!-- 给输入框的数据，起一个名字，方便在PHP中根据名字获取数据 -->
		<input type="text" name="floor">
		<!-- value是提交按钮上的文字 -->
		<!-- 如果不填默认是提交 -->
		<input type="submit" value="提交楼层"><br><br>
		<label>请输入快捷键启动功能</label1>
		<input type="text" name="digital">
		<input type="submit" value="提交快捷键">
	</form>
</body>
</html>