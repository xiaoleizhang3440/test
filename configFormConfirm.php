<?php

/**
 * @Author: xiaolei.zhang2
 * @Date:   2018-01-26 13:31:25
 * @Last Modified by:   xiaolei.zhang2
 * @Last Modified time: 2018-01-31 01:26:28
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
$con=new li_mysql();
$id=$_GET['id'];

$sql="update table_form set order_status = 1 where Id= ".$id;

$consignment_ID = $_GET["consignment_ID"];
$ship_vendor = $_GET["ship_vendor"];
$factory_vendor = $_GET["factory_vendor"];
$startime = $_GET["startime"];
$endtime = $_GET["endtime"];
$from_where = $_GET["from_where"];
$to_where = $_GET["to_where"];



$result = $con->query($sql);



header("Location: configFormList.php?consignment_ID=".$consignment_ID."&ship_vendor=".$ship_vendor."&factory_vendor=".$factory_vendor."&startime=".$startime."&endtime=".$endtime."&from_where=".$from_where."&to_where=".$to_where.""); 
exit();