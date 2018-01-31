<?php

/**
 * @Author: xiaolei.zhang2
 * @Date:   2018-01-24 22:27:48
 * @Last Modified by:   xiaolei.zhang2
 * @Last Modified time: 2018-01-24 22:53:35
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

$category = trim($_POST["category"]);
$category_code=trim($_POST["category_code"]);


if(!empty($category) && !empty($category_code)){

	$con=new li_mysql();

	$result = $con->query("select count(Id) from table_category where category_code = '$category_code'");
	$row = mysqli_fetch_array($result);

	if($row[0]>0){
		echo "已经存在改code, <a href='configCategory.php'>返回</a>";
		exit;
	}

	$sql="insert into table_category(category,category_code) values('$category','$category_code')"; 

	$insertStatus=$con->insertDB($sql);

	header("Location: configCategory.php"); 
	exit();

}

