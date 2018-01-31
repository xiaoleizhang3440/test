<?php

/**
 * @Author: xiaolei.zhang2
 * @Date:   2017-12-12 11:35:31
 * @Last Modified by:   xiaolei.zhang2
 * @Last Modified time: 2018-01-13 14:51:07
 */
error_reporting(0);
header("Content-type: text/html; charset=utf-8"); 
session_start();
if($_SESSION["user_name"]!=''){
    //echo "已经登陆";
}else{
   echo "没有登录, <a href='login.php'>登录</a>";
   exit();
}

?>

<frameset cols="10%,90%">
  <frame src="menu.html" />
  <frame src="configForm.php" name="rightFrame" />
</frameset>
<noframes>您的浏览器无法处理框架！</noframes>
