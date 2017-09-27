<?php
//php和html的融合
//数据有PHP提供
// 由html显示数据

//练习：新闻列表
// $news=['习近平会见加拿大总督',
// 		'李克强：人类的重大科学发现都不是计划出来的',
// 		'新华社发文警告印度越界：不要执迷不悟',
// 		'朝鲜被指钻制裁空子向中国出口铁矿石'];

$heafer=['姓名','电话','住址','年龄'];
$student_1=['小王','18525462586','郑州',23];
$student_2=['小贝','18525462586','北京',24];
$student_3=['小李','18525462586','上海',27];
$student_4=['小张','18525462586','天津',26];
$student_5=['小高','18525462586','杭州',24];
$datas=[$heafer,$student_1,$student_2,$student_3,$student_4,$student_5,$student_1];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>新位列表</title>
	<style>
		table{
			width: 800px;
			margin:0 auto;
			padding: 0;
		}
	</style>
</head>
<body>
	<table border="1">
		<?php
			//第一个循环决定行
			foreach ($datas as $student) {
				echo "<tr>";
				//第二个循环决定每行的个数
				foreach ($student as $value) {
					echo "<td> $value </td>";
				}
				echo "</tr>";
			}		
			
		?>
	</table>
	
</body>
</html>