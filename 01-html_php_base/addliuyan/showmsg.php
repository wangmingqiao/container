<?php
/**
 * @Author: WMQ
 * @Date:   2017-08-01 08:28:11
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-08-01 18:58:25
 */
// 展示消息，首页
// 从文件读取数据1.有数据2.没有数据
include_once 'showadd.php';
$msglist=readFileData();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>留言信息</title>
</head>
<body>
     <a href="addmsg.php">添加</a>
     <table border="1" rules="all">
        <tr>
            <td>用户名</td>
            <td>留言</td>
            <td>操作</td>
        </tr>
        <?php
        // 遍历数据获得单条msg

         foreach ($msglist as $msgDate) {
            list($user,$msg)=$msgDate;

             echo "<tr>";
             echo "<td>$user</td>";
             echo "<td>$msg</td>";
             echo "<td><a href='#'>编辑</a>-<a href='#'>删除</a></td>";
             echo "</tr>";
         }

         ?>
     </table>
</body>
<html>