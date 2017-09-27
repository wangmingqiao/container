<?php
/**
 * @Author: WMQ
 * @Date:   2017-08-04 16:20:23
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-08-05 08:46:24
 */
//键，值，操作
//count($var[,$mode=COUNT_NORMAL])/sizeof():计算数组中的单元数目或对象中的属性个数
// array_keys($array):取得数组的键名作为下标连续的索引数组返回
$arr=range('a','z',2);
var_dump($arr);
$keys=array_keys($arr);
var_dump($keys);
// array_values($array):取得数组的键值作为下标连续的索引数组返回
var_dump(array_values($arr));

// array_flip($array):交换数组中的键名和键值
var_dump(array_flip($arr));

// in_array($search,$array[,$strict]):检测数组中是否存在某个值
if (in_array('a',$arr)) {
    echo "in";
}else{
    echo'no-in';
}
// array_search($search,$array[,$strict]):在数组中搜索给定的值，如果成功则返回相应的键名
var_dump(array_search('a',$arr));

// array_key_exists($search,$array):检查给定的键名或索引是否存在于数组中
var_dump(array_key_exists('12',$arr));

// array_reverse($array[,$preserve_keys=false]):数组倒置
var_dump(array_reverse($arr));

// shuffle($array):打乱数组的元素
shuffle($arr);
var_dump($arr);

// array_rand($array[,$num_req=1]):随机取出数组的键名
var_dump(array_rand($arr));

// array_unique($array[,$sort_flag=SORT_STRING]):移除数组中重复的值
// array_sum($array):统计数组中元素值的总和
var_dump(array_sum(array_flip($arr)));

// array_product($array):计算数组中所有值的乘积
unset($arr[0]);
var_dump(array_product(array_flip($arr)));

// array_count_values($array):统计数组中值出现的次数


// extract($array[,$extract_type=EXTR_OVERWRITE[,$prefix=null]]):从数组中将变量导入到当前的符号表

extract(array_flip($arr));
echo $a,$c,$e,$g,$i,$k,$m;

// array_pad($array,$size,$value):用值将数组填补到指定长度
$res=array_pad($arr,20,'php');
var_dump($res);