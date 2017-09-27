<?php
$inputSource='';//用户输入0-100之间的数
if (isset($_POST['source'])) {
	$inputSource=(int)$_POST['source'];
}
//写一个逻辑根据用户输入的不同分数，给他返回不同的评级
if ($inputSource) {
	if ($inputSource>=0 && $inputSource<59) {
		echo "学渣";
	}elseif ($inputSource>=60 && $inputSource<69){
		echo "及格";
	}elseif($inputSource>=70 && $inputSource<89){
		echo "中等";
	}elseif ($inputSource>=80 && $inputSource<89) {
		echo "良好";
	}elseif ($inputSource>=90 && $inputSource<=100) {
		echo "学霸";
	}else{
	echo "缺考";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>考分评定系统</title>
</head>
<body>
	<form action="sourceDemo.php" method="post">
		<label >输入考试成绩:</label>
		<input type="text" name="source">
		<input type="submit" value="提交成绩">
	</form>

</body>
</html>