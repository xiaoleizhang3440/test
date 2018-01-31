<?php

/**
 * @Author: xiaolei.zhang2
 * @Date:   2017-12-22 10:28:28
 * @Last Modified by:   xiaolei.zhang2
 * @Last Modified time: 2018-01-20 20:51:36
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

$delegate_num ='';
$consignment_ID=$_POST["consignment_ID"];

$goods_name=$_POST['goods_name'];

$contract_num =$_POST["contract_num"];

$package_num=$_POST['package_num'];

$package_volume=$_POST["package_volume"];

$steel_type=$_POST["steel_type"];

$delegate_num=$_POST["delegate_num"];

$vehicle_type=$_POST["vehicle_type"];
$vehicle_amount =$_POST["vehicle_amount"];
$receiver_comment=$_POST["receiver_comment"];
$from_where=$_POST["from_where"];
$to_where=$_POST["to_where"];
$delegate_item=$_POST["delegate_item"];
$vehicle_num=$_POST["vehicle_num"];
$vehicle_trips=$_POST["vehicle_trips"];
$kilo_meter=$_POST["kilo_meter"];
$vehicle_weight=$_POST["vehicle_weight"];
$vehicle_starttime=$_POST["vehicle_starttime"];

$vehicle_endtime=$_POST["vehicle_endtime"];
$dispatch_comment = $_POST["dispatch_comment"];

$driver_item1=$_POST["driver_item1"];
$driver_comment1=$_POST["driver_comment1"];
$ton_num=$_POST["ton_num"];
$dump_num=$_POST["dump_num"];
$goods_level=$_POST["goods_level"];
$cost_ship_weight=$_POST["cost_ship_weight"];
$cost_ship_unitprice=$_POST["cost_ship_unitprice"];
$cost_ship_gross=$_POST["cost_ship_gross"];
$driver_item2=$_POST["driver_item2"];
$driver_comment2=$_POST["driver_comment2"];
$cost_dump_weight=$_POST["cost_dump_weight"];
$cost_dump_unitprice=$_POST["cost_dump_unitprice"];
$cost_dump_gross=$_POST["cost_dump_gross"];
$driver_item3=$_POST["driver_item3"];
$driver_comment3=$_POST["driver_comment3"];
$ship_biller=$_POST["ship_biller"];
$ship_date=$_POST["ship_date"];

$ship_formula=$_POST["ship_formula"];
$driver_item4=$_POST["driver_item4"];
$driver_comment4=$_POST["driver_comment4"];
$caculated_price=$_POST["caculated_price"];
$driver_item5=$_POST["driver_item5"];
$driver_comment5=$_POST["driver_comment5"];
$delegate_unit=$_POST["delegate_unit"];
$delegate_person=$_POST["delegate_person"];
$ship_vendor=$_POST["ship_vendor"];
$sendorder_person=$_POST["sendorder_person"];

/*
if($consignment_ID=='' || $goods_name=='' || $contract_num=='' || $package_num=='' || $package_volume=='' || $steel_type=='' || $delegate_num=='' || $vehicle_type =='' || $vehicle_amount=='' || $receiver_comment =='' || $from_where=='' || $to_where == '' || $delegate_item=='' || $vehicle_num=='' || $vehicle_trips == '' || $kilo_meter == '' || $vehicle_weight =='' || $vehicle_starttime=='' || $vehicle_endtime=='' || $dispatch_comment == '' || $driver_item1 =='' || $ton_num =='' || $dump_num=='' || $goods_level=='' || $cost_ship_weight=='' || $cost_ship_unitprice=='' || $cost_ship_gross=='' || $cost_dump_weight == '' ||  $cost_dump_unitprice=='' || $cost_dump_gross=='' || $ship_biller=='' || $ship_date=='' || $ship_formula=='' || $caculated_price ==''){
	
	echo "不能有空缺 <a onclick='window.history.back(-1)' style='cursor:hand;'>返回</a>";
	exit();
}

if(!is_numeric($package_num) || !is_numeric($delegate_num)  || !is_numeric($vehicle_num) ||  !is_numeric($cost_ship_weight) || !is_numeric($cost_dump_weight)  || !is_numeric($caculated_price)){
	echo "个数，委托吨数，车辆数，计费重量必须为数字 <a onclick='window.history.back(-1)' style='cursor:hand;'>返回</a>";
	exit();
}

*/
$con=new li_mysql();
$sql="insert into table_form(consignment_ID,goods_name,contract_num,package_num,package_volume,steel_type,delegate_num,vehicle_type,vehicle_amount,receiver_comment,from_where,to_where,delegate_item,vehicle_num,vehicle_trips,kilo_meter,vehicle_weight,vehicle_starttime,vehicle_endtime,dispatch_comment,driver_item1,driver_comment1,driver_item2,driver_comment2,driver_item3,driver_comment3,driver_item4,driver_comment4,driver_item5,driver_comment5,ton_num,dump_num,goods_level,cost_ship_weight,cost_dump_weight,cost_ship_unitprice,cost_dump_unitprice,cost_ship_gross,cost_dump_gross,ship_formula,ship_biller,ship_date,caculated_price,delegate_unit,delegate_person,ship_vendor,sendorder_person) values('$consignment_ID','$goods_name','$contract_num','$package_num','$package_volume','$steel_type','$delegate_num','$vehicle_type','$vehicle_amount','$receiver_comment','$from_where','$to_where','$delegate_item','$vehicle_num','$vehicle_trips','$kilo_meter','$vehicle_weight','$vehicle_starttime','$vehicle_endtime','$dispatch_comment','$driver_item1','$driver_comment1','$driver_item2','$driver_comment2','$driver_item3','$driver_comment3','$driver_item4','$driver_comment4','$driver_item5','$driver_comment5','$ton_num','$dump_num','$goods_level','$cost_ship_weight','$cost_dump_weight','$cost_ship_unitprice','$cost_dump_unitprice','$cost_ship_gross','$cost_dump_gross','$ship_formula','$ship_biller','$ship_date','$caculated_price','$delegate_unit','$delegate_person','$ship_vendor','$sendorder_person')";


$insertStatus=$con->insertDB($sql);
$id = $con->getInsertId();
$t=time();

if($insertStatus){
	header("Location: configForm.php?id=".$id."&t=".$t); 
	exit();
}else{
	echo "insert failed";
	exit();
}