<?php

/**
 * @Author: xiaolei.zhang2
 * @Date:   2018-01-25 15:31:34
 * @Last Modified by:   xiaolei.zhang2
 * @Last Modified time: 2018-01-25 15:43:28
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

$id=$_GET["id"];

$sql="DELETE FROM table_category where Id=$id ";

$con=new li_mysql();
$result = $con->query($sql);

header("Location: configCategory.php"); 
exit();
