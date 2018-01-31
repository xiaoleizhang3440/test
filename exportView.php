<?php

/**
 * @Author: xiaolei.zhang2
 * @Date:   2017-12-24 10:13:06
 * @Last Modified by:   xiaolei.zhang2
 * @Last Modified time: 2017-12-31 22:58:58
 */
header("Content-type: text/html; charset=utf-8"); 
header("Content-type:application/vnd.ms-excel");
header("Content-Disposition:filename=view.xls"); 
session_start();
if($_SESSION["user_name"]!=''){
    //echo "已经登陆";
}else{
   echo "没有登录, <a href='login.php'>登录</a>";
   exit();
}
require_once("./conn/conn.php");

$con=new li_mysql();
$result = $con->query("select * from table_form where Id=".$_GET["id"]);

$row = mysqli_fetch_array($result);

$consignment_ID=$row["consignment_ID"];

$goods_name=$row['goods_name'];

$contract_num =$row["contract_num"];

$package_num=$row['package_num'];

$package_volume=$row["package_volume"];

$steel_type=$row["steel_type"];

$delegate_num=$row["delegate_num"];

$vehicle_type=$row["vehicle_type"];
$vehicle_amount =$row["vehicle_amount"];
$receiver_comment=$row["receiver_comment"];
$from_where=$row["from_where"];
$to_where=$row["to_where"];
$delegate_item=$row["delegate_item"];
$vehicle_num=$row["vehicle_num"];
$vehicle_trips=$row["vehicle_trips"];
$kilo_meter=$row["kilo_meter"];
$vehicle_weight=$row["vehicle_weight"];
$vehicle_starttime=$row["vehicle_starttime"];
$vehicle_endtime=$row["vehicle_endtime"];
$dispatch_comment = $row["dispatch_comment"];

$driver_item1=$row["driver_item1"];
$driver_comment1=$row["driver_comment1"];
$ton_num=$row["ton_num"];
$dump_num=$row["dump_num"];
$goods_level=$row["goods_level"];
$cost_ship_weight=$row["cost_ship_weight"];
$cost_ship_unitprice=$row["cost_ship_unitprice"];
$cost_ship_gross=$row["cost_ship_gross"];
$driver_item2=$row["driver_item2"];
$driver_comment2=$row["driver_comment2"];
$cost_dump_weight=$row["cost_dump_weight"];
$cost_dump_unitprice=$row["cost_dump_unitprice"];
$cost_dump_gross=$row["cost_dump_gross"];
$driver_item3=$row["driver_item3"];
$driver_comment3=$row["driver_comment3"];
$ship_biller=$row["ship_biller"];
$ship_date=$row["ship_date"];
$ship_formula=$row["ship_formula"];
$driver_item4=$row["driver_item4"];
$driver_comment4=$row["driver_comment4"];
$caculated_price=$row["caculated_price"];
$driver_item5=$row["driver_item5"];
$driver_comment5=$row["driver_comment5"];


echo "<table border='1' cellspacing='1' cellpadding='0' width='100%' >";

echo "<tr>";
	echo "<td align='center' colspan='10'><h1>宝钢特钢物流运输（汽车）车辆调配单（代合同）</h1></td>";
echo "</tr>";

	echo "<tr><td colspan='10'><h3>托运单位：制造管理部  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;联系人: xxxx &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  电话 :26032555  &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;地址：水产路1251  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;托运单序号： ".$consignment_ID."</h3></td></tr>";

	echo "<tr>";
	echo "<td>货物名称</td><td>合同号</td><td>件数</td><td>每件体积</td><td>钢种</td><td>委托总吨位</td><td>需要车种</td><td>需要车辆数</td><td colspan=2>求运输起止时间（按24小时计）</td>";
	echo "</tr>";

	echo "<tr>";
	echo "<td>".$goods_name."</td><td>".$contract_num."</td><td>".$package_num."</td><td>".$package_volume."</td><td>".$steel_type."</td><td>".$delegate_num."</td><td>".$vehicle_type."</td><td>".$vehicle_amount."</td><td colspan=2>".$vehicle_starttime." -- ".$vehicle_endtime."</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>起运地</td><td colspan=3>".$from_where."</td><td>到达地</td><td colspan=5>".$to_where."</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>委托事项</td><td>车号</td><td>驾驶员</td><td>备注</td><td>车次</td>";
	echo "<td></td><td>计费项目</td><td>计费重量</td><td>单价</td><td>金额</td>";
	echo "</tr>";

	echo "<tr>";
	echo "<td rowspan=5>".$delegate_item."</td><td>".$vehicle_num."</td><td>".$driver_item1."</td><td>".$driver_comment1."</td><td>公里</td>";
	echo "<td></td><td>运输费</td><td>".$cost_ship_weight."</td><td>".$cost_ship_unitprice."</td><td>".$cost_dump_gross."</td>";
	echo "</tr>";

	echo "<tr>";
	echo "<td>".$vehicle_num."</td><td>".$driver_item2."</td><td>".$driver_comment2."</td><td>车吨</td>";
	echo "<td>".$vehicle_weight."</td><td>装卸费</td><td>".$cost_dump_weight."</td><td>".$cost_dump_unitprice."</td><td>".$cost_dump_gross."</td>";
	echo "</tr>";

	echo "<tr>";
	echo "<td>".$vehicle_num."</td><td>".$driver_item3."</td><td>".$driver_comment3."</td><td>吨公里</td>";
	echo "<td>".$ton_num."</td><td></td><td></td><td></td><td></td>";
	echo "</tr>";

	echo "<tr>";
	echo "<td>".$vehicle_num."</td><td>".$driver_item4."</td><td>".$driver_comment5."</td><td>倾卸次</td>";
	echo "<td>".$dump_num."</td><td></td><td></td><td></td><td></td>";
	echo "</tr>";

	echo "<tr>";
	echo "<td>".$vehicle_num."</td><td>".$driver_item5."</td><td>".$driver_comment5."</td><td>货物等级</td>";
	echo "<td>".$goods_level."</td><td>总计人民币</td><td colspan=3>".$caculated_price."</td>";
	echo "</tr>";

	echo "<tr>";
	echo "<td>收货部门<br/>签证或留言</td><td colspan=2>".$receiver_comment."</td><td>调度留言</td><td colspan=2>".$dispatch_comment."</td>";
	echo "<td>开帐员和日期<br/>".$ship_biller."<br>".$ship_date."</td><td colspan=3>受理调度盖章<br/><br/><br/></td>";
	echo "</tr>";
echo "</table>";
