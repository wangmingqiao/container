<?php
/**
 * @Author: WMQ
 * @Date:   2017-08-01 08:29:48
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-08-01 18:56:52
 */
function readFileData(){
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
    return $msglist;
}
