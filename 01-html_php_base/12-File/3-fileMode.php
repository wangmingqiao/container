<?php
/**
 * @Author: WMQ
 * @Date:   2017-08-07 15:44:57
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-08-19 14:17:14
 */
// 操作文件的时候需要注意文件的权限
// 文件的操作就是用户有没有操作文件的权利
// 文件的权限:读 写 执行1
// 读 r
// 写 w
// 执行 x
// -rwxrwxrwx最高权限
// -文件类型 d:文件夹 1软连接 b块
// 第一个 rwx 文件的所有者拥有的权限
// 第二个 rwx 文件的所有者所在组拥有的权限
// 第三个 rwx 其他用户

//权限的数字表示法(记住)
//r:4
//w:2
//x:1

// 最高权限 777

// rw- r-- r-- 644

// 文件的权限是可以修改的
// chmod -改变文件的权限
// charp -改变问价所属的组
// chown -改编文件的所有者
// filegroup 取得文件的组
// fileowner 取得文件的所有者


$file_name='chmod.txt';//644 rw-r--r--
if (touch($file_name)) {
//     echo '创建成功';
    //修改文件的权限
    if (chmod($file_name,0177)) {
        // if (file_put_contents($file_name,'test code')) {
        //     echo '写入成功';
        // }else{
        //     echo'写入失败';
        // }
        if (file_get_contents($file_name)) {
            echo'读取成功';
        }else{
            echo '读取失败';
        }
    }
}
//fileowner($file_name)得到文件的用户id
//posix_getpwuid 查看(linux)
// var_dump(posix_getpwuid(fileowner($file_name)));