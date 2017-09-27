<?php
$arr = range('a', 'z');
while(current($arr)){
    echo key($arr)."=>".current($arr).'<br>';
    next($arr);
}
echo "<hr>";
$array = range('A', 'Z');
while(list($key,$v)=each($array)){
    echo "$key=>$v"."<br>";
}
 ?>
