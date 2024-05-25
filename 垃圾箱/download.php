<?php
$dir = "./upload/";
echo "upload文件:";
echo '<br>';
$a = scandir($dir,1);
print_r($a);
echo '<br>';
echo "使用方法：";
echo "输入：http://www.wzhserver.eu.org:12354/upload/";
echo "后面跟你要下载的文件"

?>