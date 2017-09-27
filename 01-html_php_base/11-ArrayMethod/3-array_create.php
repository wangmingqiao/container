<?php
/**
 * @Author: WMQ
 * @Date:   2017-08-04 16:01:24
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-08-04 16:16:16
 */
//数组的创建
// range(low, high, step);范围数组
// compact(var_names);关联数组
//
// 参数1.开始位置2.填充数量3.填充内容
// array_fill(start_key, num, val);
$arr=array_fill(0,4,'php');
var_dump($arr);

// array_fill_keys(keys, val)
// 参数1.键值2.value
$keys=['a','b','c','d'];
$arr=array_fill_keys($keys,'php');
var_dump($arr);

$arr1=['color','fruits'];
$arr2=['red','apple'];
var_dump(array_combine($arr1,$arr2));