<?php
//do while 循环
// do {
// 	# code...
// } while ( <= 10);
//0-10奇数
$a=0;
do {
	echo "<br>$a";
	$a++;
} while ( $a<= 10);
echo"<hr>";

$a=1;
do {
	echo "<br>$a";
	$a+=2;
} while ( $a<= 10);
echo "<hr>";

$a=0;
do {
	if ($a%2!=0) {
		echo "<br>$a";
	}$a++;
} while ($a < 10);

?>