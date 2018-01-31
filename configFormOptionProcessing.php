<?php

/**
 * @Author: xiaolei.zhang2
 * @Date:   2017-12-21 11:03:36
 * @Last Modified by:   xiaolei.zhang2
 * @Last Modified time: 2017-12-21 13:53:21
 */
header("Content-type: text/html; charset=utf-8"); 
session_start();
if($_SESSION["user_name"]!=''){
    //echo "已经登陆";
}else{
   echo "没有登录, <a href='login.php'>登录</a>";
   exit();
}
require_once("./conn/conn.php");

$option_value='';
$option_category='';
$con;

$con=new li_mysql();

$option_value = $_POST["option_value"];
$option_category = $_POST["option_category"];

if($option_value=='' || $option_category==''){
	echo "两个都必选 <a href='configFormOption.php'>返回</a>";
	exit();
}

$insertStatus=$con->insertDB("insert into table_options(option_value,option_category) values('$option_value','$option_category')");

if($insertStatus){
	header("Location: configFormOption.php"); 
	exit();
}else{
	echo "insert failed";
	exit();
}

