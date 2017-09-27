<?php
$digital='';//用户输入0-100之间的数
if (isset($_POST['digital'])) {
	$digital=(int)$_POST['digital'];
}
if ($digital) {
	for($i=0;$i<100;$i++){
	if ($digital%10==$i%10) {
		echo "<br>$i";
	}
	else{
		continue;
	}
}
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>输出用户个数相同的数</title>
</head>
<body>
	<form action="lianxi.php" method="post">
		<label >请输入数字</label>
		<input type="text" name="digital">
		<input type="submit" value="提交数字">
	</form>

</body>
</html>