<?php
/**
 * @Author: WMQ
 * @Date:   2017-07-27 09:37:30
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-07-27 14:09:55
 */
$a =true;
if (is_int($a)) {
    echo"是int类型";
}else{
    echo"不是int类型";
}
echo "<br>";
if (is_numeric($a)) {
    echo "是数值";
}else{
    echo "不是数值";
}
echo "<br>";
if (is_bool($a)) {
    echo"是bool";
}else{
    echo"不是bool";
}
echo "<br>";
if (is_array($a)) {
    echo"是array";
}else{
    echo "不是array";
}
