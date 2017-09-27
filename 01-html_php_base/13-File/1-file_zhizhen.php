<?php
/**
 * @Author: WMQ
 * @Date:   2017-08-08 10:16:43
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-08-08 10:44:43
 */
//文件的指针
// ftell(fp)获得当前指针的位置
// rewind(fp)回到初始指针的位置
// fseek(fp, offset, whence)指针跳转
$file_name='aa.txt';
$fp=fopen($file_name,'r');

echo '<br>'.fgets($fp);
echo '<hr>指针'.ftell($fp);

// rewind($fp);
//
echo '<br>'.fgets($fp);
echo '<hr>指针'.ftell($fp);

// rewind($fp);

echo '<br>'.fgets($fp);
echo '<hr>指针'.ftell($fp);

rewind($fp);
echo '<br>'.fread($fp,15);
echo '<hr>指针'.ftell($fp);

rewind($fp);
fseek($fp,38,SEEK_SET);//直接定义到文件指针38的位置
echo '<hr>'.fgets($fp);

rewind($fp);
fseek($fp,-8,SEEK_END);//结尾，向前移动
echo '<hr>'.fgets($fp);

fseek($fp,-26,SEEK_CUR);//在当前位置,向前移动
echo '<hr>'.fgets($fp);
