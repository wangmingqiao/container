<?php
/**
 * @Author: MR
 * @Date:   2017-07-31 21:49:52
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-07-31 22:25:06
 */
function accept(){
    global $filename;
$filename='msg.txt';
// file_exists判断文件是否存在
@$fileContent=file_get_contents($filename);
if ($fileContent) {
    //有数据
    global $msglist;
    $msglist=unserialize($fileContent);
}else {
    // 没数据
    $msglist=array();
}
}
