.<?php
/**
 * @Author: WMQ
 * @Date:   2017-08-01 09:24:22
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-08-09 21:26:44
 */
//可变参数的函数
// function test(){
//     //获取参数的数量
//     $arg_nums=func_num_args();
//     echo '<br>'.$arg_nums;
//     //func_get_arg 根据参数的下标获取参数的值
//     for ($i=0; $i <$arg_nums ; $i++) {
//         echo'<br>'.func_get_arg($i);
//     }
//     // func_get_args(); 直接获取所有参数的数组
//     $args=func_get_args();
//     echo'<hr>';
//     foreach ($args as $key => $value) {
//         echo '<br>'.$key.$value;
//     }


// }
// test('v','f','f','1',2,3,'dvgf');


//不定参数的方法
//实现array()的功能
// function custom_array(){
//     return  func_get_args();
// }
// echo '<hr>';
// $arr=custom_array('a','b','c','d');
// var_dump($arr);
// echo'<hr>';
//索引数组
function custom_array(){
    $key=$arr=null;
    for ($i=0; $i <func_num_args() ; $i++) {
        if ($i%2==0) {
            $key=func_get_arg($i);
        }else {
            $arr[$key]=func_get_arg($i);
        }
    }
    return $arr;
}
echo '<hr>';
$arr=custom_array('a','b','c','d','e','f');
var_dump($arr);
// 关联数组
// 系统规则 key=>value 自己的规则 key:value
// function cus_array(){
//     //1.取参数
//     $args=func_get_args();
//     //2.根据参数判断决定数组元素该怎么放
//     $arr=null;
//     foreach ($args as $arg) {
//         //如果参数遵循关联数组的原则(a:b)
//         if(strlen(stristr($arg,':'))){
//             //获取key
//             $key=stristr($arg,':',true);
//             $value=ltrim(stristr($arg,':'),':');
//             $arr[$key]=$value;

//         }else{
//             $arr[]=$arg;
//         }
//     }
//     return $arr;
// }
// $arr=cus_array('a:b','b:c','c:d','d','e','f');
// var_dump($arr);



// function custom_array(){
//     //1,取参数
//     $args = func_get_args();
//     //2,根据参数来决定数组元素怎么放
//     $arr = null;
//     foreach ($args as $arg) {
//         //如果参数遵循关联数组的原则(a:b)
//         if (strlen(stristr($arg, ':'))) {
//             //获取key
//             $key = stristr($arg,':',true);
//             $value = ltrim(stristr($arg,':'), ':');
//             $arr[$key] = $value;
//         }else {
//             $arr[]=$arg;
//         }
//     }
//     return $arr;
// }

// echo '<hr>';
// $arr = custom_array('a','b:hello','c:php','e','f','g');
// var_dump($arr);