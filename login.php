<link rel="stylesheet" href="css/global.css" type="text/css" />
<link rel="stylesheet" href="css/common.css" type="text/css" />
<?php

/**
 * @Author: xiaolei.zhang2
 * @Date:   2017-12-11 10:47:09
 * @Last Modified by:   xiaolei.zhang2
 * @Last Modified time: 2018-01-13 11:23:19
 */
error_reporting(0);
header("Content-type: text/html; charset=utf-8"); 
require_once("./conn/conn.php");

echo "<div class='LoginBox LoginLog'></div>";
echo '<hr/><br/>';

	echo "<div id='loginForm' style='width:400px;height:200px;grey;margin:0 auto;'>";
		echo "<form action='loginProcessing.php' method='post'>";
			echo "<div class='Loginc'>";
			echo "<div style='margin:40px;text-align:center;'>";
			echo "<br/><br/>";
			echo "用户名: <input type='text' name='ad_username' ><br/><br/><br/>";
			echo "密&nbsp;&nbsp;&nbsp; 码: <input type='password' name='ad_userpwd' ><br/><br/><br/>";
			echo "<div style='posititon:relative;margin:20px -100px;'><input name='tj_login' type='submit' class='loginBtn' value=''></div>";
			echo "</div>";
			echo "</div>";
		echo "</form>";
	echo "</div>";

