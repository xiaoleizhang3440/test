<?php

/**
 * @Author: xiaolei.zhang2
 * @Date:   2018-01-30 23:57:10
 * @Last Modified by:   xiaolei.zhang2
 * @Last Modified time: 2018-01-31 00:49:38
 */

header("Cache-Control:no-cache,must-revalidate,no-store"); 
header("Pragma:no-cache");
header("Expires:-1");

header("Content-type: text/html; charset=utf-8"); 
session_start();
if($_SESSION["user_name"]!=''){
    //echo "已经登陆";
}else{
   echo "没有登录, <a href='login.php'>登录</a>";
   exit();
}
require_once("./conn/conn.php");


$n=$_POST["i"];

$consignment_ID=$_POST["consignment_ID_edit".$n.""];

$create_time=$_POST["create_time_edit".$n.""];

$arrDateSelected = explode("/", $create_time);
$create_time= $arrDateSelected[2]."-".$arrDateSelected[0]."-".$arrDateSelected[1];

$delegate_unit=$_POST["delegate_unit_edit".$n.""];

$delegate_person=$_POST["delegate_person_edit".$n.""];

$from_where=$_POST["from_where_edit".$n.""];

$to_where=$_POST["to_where_edit".$n.""];

$goods_name=$_POST["goods_name_edit".$n.""];

$delegate_num=$_POST["delegate_num_edit".$n.""];

$cost_ship_unitprice=$_POST["cost_ship_unitprice_edit".$n.""];

$caculated_price=$_POST["caculated_price_edit".$n.""];

$vehicle_num=$_POST["vehicle_num_edit".$n.""];

$ship_vendor=$_POST["ship_vendor_edit".$n.""];

$vehicle_weight=$_POST["vehicle_weight_edit".$n.""];

$driver_comment1=$_POST["driver_comment1_edit".$n.""];


$sql="update table_form set ";
$sql.=" delegate_unit='$delegate_unit', delegate_person='$delegate_person' ,";
$sql.="from_where='$from_where' , to_where='$to_where' , goods_name='$goods_name' ,delegate_num='$delegate_num' ,";
$sql.="cost_ship_unitprice ='$cost_ship_unitprice', caculated_price='$caculated_price', vehicle_num='$vehicle_num' ,  ship_vendor='$ship_vendor' ,";
$sql.="vehicle_weight='$vehicle_weight' , driver_comment1='$driver_comment1' where consignment_ID='$consignment_ID' ";


$con=new li_mysql();

$result = $con->query($sql);

header("Location: configForm.php"); 
exit();