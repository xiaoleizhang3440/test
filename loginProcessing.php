<?php

/**
 * @Author: xiaolei.zhang2
 * @Date:   2017-12-11 11:14:29
 * @Last Modified by:   xiaolei.zhang2
 * @Last Modified time: 2018-01-05 13:15:54
 */

header("Content-type: text/html; charset=utf-8"); 
require_once("./conn/conn.php");

$u = trim($_POST["ad_username"]);
$p=md5(md5(trim($_POST["ad_userpwd"])));

$con=new li_mysql();
if($result = $con->query("select * from table_admin where admin_name ='$u' and admin_password = '$p' and Id=2 ")){
    $rowcount=mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);
    $user_name=$row["admin_name"];
    mysqli_free_result($result);
}

if( $rowcount==1){
	session_start();
	$_SESSION["user_name"]=$user_name;
	header("Location: backendFrame.php");
	exit();
}else{
	echo "您的账号密码错误. <a href='login.php'>返回</a>";
	exit();
}
$con->closeDB();