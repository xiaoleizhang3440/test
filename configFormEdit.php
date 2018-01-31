
<style>
	input{
		width: 110px;
	}
	h3{
			font-size: 20px;
		}
</style>

<link rel="stylesheet" type="text/css" href="tcal.css" />
<script type="text/javascript" src="tcal.js"></script> 
<?php

/**
 * @Author: xiaolei.zhang2
 * @Date:   2017-12-19 22:45:00
 * @Last Modified by:   xiaolei.zhang2
 * @Last Modified time: 2018-01-31 01:56:27
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

echo "<h3>委托单配置</h3>";
echo "<hr><br/>";


$con=new li_mysql();
$result = $con->query("select * from table_form where Id=".$_GET["id"]);
$row = mysqli_fetch_array($result);
$s=$row["consignment_ID"];

$consignment_ID =$s;
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
$delegate_unit =$row["delegate_unit"];
$delegate_person=$row["delegate_person"];
$sendorder_person=$row["sendorder_person"];
$ship_vendor=$row["ship_vendor"];


$consignment_ID = $_GET["consignment_ID"];
$ship_vendor = $_GET["ship_vendor"];
$factory_vendor = $_GET["factory_vendor"];
$startime = $_GET["startime"];
$endtime = $_GET["endtime"];
$from_where = $_GET["from_where"];
$to_where = $_GET["to_where"];
$result->close();

echo "<form action='configFormEditProcessing.php?consignment_ID=".$consignment_ID."&ship_vendor=".$ship_vendor."&factory_vendor=".$factory_vendor."&startime=".$startime."&endtime=".$endtime."&from_where=".$from_where."&to_where=".$to_where."' method='post'>";
	echo "<table border='1' cellspacing='3' cellpadding='0' width='100%' height='400px' >";
	echo "<tr style='background:#76b9ed;height='30px;'><td>托运单号</td><td>货物名称</td><td>合同号</td><td>件数</td><td>每件体积</td><td>钢种</td><td>委托总吨位</td><td>需要车种</td><td>需要车辆数</td><td>收货部门留言</td></tr>";

	$result = $con->query("select * from table_options where option_category ='goods_name'");
	echo "<tr><td><a href=#>".$consignment_ID ."</a><input type='hidden' name='consignment_ID' value='$consignment_ID'></td><td><select name='goods_name'>";
	echo "<option value=''>-- 请选择 --</option>";
	while ($row = mysqli_fetch_array($result)) {
		if($row['option_value']==$goods_name){
			$selectedcurrent='selected';
		}else{
			$selectedcurrent='';
		}
		
		echo "<option value=".$row['option_value']." ".$selectedcurrent.">".$row['option_value']."</option>";
}
$result->close();
	echo "</select></td>";
	echo "<td><input type='text' name='contract_num'  value='$contract_num'></td><td><input type='text' name='package_num' value='$package_num'></td>";
	echo "<td><select name='package_volume'>";
	echo "<option value=''>-- 请选择 --</option>";
	$result = $con->query("select * from table_options where option_category ='package_volume'");	
	while ($row = mysqli_fetch_array($result)) {
		if($row['option_value']==$package_volume){
			$selectedcurrent='selected';
		}else{
			$selectedcurrent='';
		}
		echo "<option value=".$row['option_value']." ".$selectedcurrent.">".$row['option_value']."</option>";
}
$result->close();
	echo "</select></td>";
	echo "<td><select name='steel_type'><option value=''>-- 请选择 --</option>";
	$result = $con->query("select * from table_options where option_category ='steel_type'");	
	while ($row = mysqli_fetch_array($result)) {
		if($row['option_value']==$steel_type){
			$selectedcurrent='selected';
		}else{
			$selectedcurrent='';
		}
		echo "<option value=".$row['option_value']." ".$selectedcurrent.">".$row['option_value']."</option>";
}
$result->close();	
	echo "</select></td><td><input type='text' name='delegate_num' value='$delegate_num'></td><td><select name='vehicle_type'>";
	echo "<option value=''>-- 请选择 --</option>";
	$result = $con->query("select * from table_options where option_category ='vehicle_type'");	
	while ($row = mysqli_fetch_array($result)) {
		if($row['option_value']==$vehicle_type){
			$selectedcurrent='selected';
		}else{
			$selectedcurrent='';
		}
		echo "<option value=".$row['option_value']." ".$selectedcurrent.">".$row['option_value']."</option>";
}
$result->close();		
	echo "</select></td><td><input type='text' name='vehicle_amount' value='$vehicle_amount'></td><td><input type='text' name='receiver_comment' value='$receiver_comment'></td></tr>";
	echo "<tr style='background:#76b9ed;'><td>委托单位</td><td>起运地</td><td>到达地</td><td>委托事项</td><td>车号</td><td>车次</td><td>公里</td><td>车吨</td><td>运输起止时间(24小时计)</td><td>调度留言</td></tr>";
	echo "<tr><td><input type='text' name='delegate_unit' value='$delegate_unit'></td><td><select name='from_where'><option value=''>-- 请选择 --</option>";
	$result = $con->query("select * from table_options where option_category ='from_where'");	
	while ($row = mysqli_fetch_array($result)) {

		if($row['option_value']==$from_where){
			$selectedcurrent='selected';
		}else{
			$selectedcurrent='';
		}
		echo "<option value=".$row['option_value']." ".$selectedcurrent.">".$row['option_value']."</option>";
}
$result->close();	
	echo "</select></td><td><select name='to_where'><option value=''>-- 请选择 --</option>";
	$result = $con->query("select * from table_options where option_category ='to_where'");	
	while ($row = mysqli_fetch_array($result)) {

		if($row['option_value']==$to_where){
			$selectedcurrent='selected';
		}else{
			$selectedcurrent='';
		}
		echo "<option value=".$row['option_value']." ".$selectedcurrent.">".$row['option_value']."</option>";
}
$result->close();		
	echo "</select></td><td><select name='delegate_item'><option value=''>-- 请选择 --</option>";
	$result = $con->query("select * from table_options where option_category ='delegate_item'");	
	while ($row = mysqli_fetch_array($result)) {
		if($row['option_value']==$delegate_item){
			$selectedcurrent='selected';
		}else{
			$selectedcurrent='';
		}
		echo "<option value=".$row['option_value']." ".$selectedcurrent.">".$row['option_value']."</option>";
}
$result->close();	
	echo "</select></td><td><input type='text' name='vehicle_num' value='$vehicle_num'></td><td><input type='text' name='vehicle_trips' value='$vehicle_trips'></td><td><input type='text' name='kilo_meter' value='$kilo_meter'></td><td><input type='text' name='vehicle_weight' value='$vehicle_weight'></td><td><input type='text' name='vehicle_starttime' value='$vehicle_starttime'> <a href=#>--</a> <input type='text' name='vehicle_endtime' value='$vehicle_endtime'></td><td><input type='text' name='dispatch_comment' value='$dispatch_comment'></td></tr>";
	echo "<tr style='background:#76b9ed;'><td>委托人</td><td>驾驶员</td><td>备注</td><td>吨公里</td><td>倾斜次</td><td>货物等级</td><td>计费项目</td><td>计费重量</td><td>单价</td><td>金额</td></tr>";
	echo "<tr><td><input type='text' name='delegate_person' value='$delegate_person'></td><td><input type='text' name='driver_item1' value='$driver_item1'></td><td><input type='text' name='driver_comment1' value='$driver_comment1'></td><td><input type='text' name='ton_num' value='$ton_num'></td><td><input type='text' name='dump_num' value='$dump_num'></td><td><input type='text' name='goods_level' value='$goods_level'></td><td style='background:#76b9ed;'>运输费</td><td><input type='text' name='cost_ship_weight' value='$cost_ship_weight'></td><td><input type='text' name='cost_ship_unitprice' value='$cost_ship_unitprice'></td><td><input type='text' name='cost_ship_gross' value='$cost_ship_gross'></td></tr>";
	echo "<tr><td style='background:#76b9ed;'>承运商</td><td><input type='text' name='driver_item2' value='$driver_item2'></td><td></td><td style='background:#76b9ed;'>开账员</td><td colspan='2' style='background:#76b9ed;'>开账日期</td><td style='background:#76b9ed;'>装卸费</td><td><input type='text' name='cost_dump_weight'  value='$cost_dump_weight'></td><td><input type='text' name='cost_dump_unitprice' value='$cost_dump_unitprice'></td><td><input type='text' name='cost_dump_gross' value='$cost_dump_gross'></td></tr>";
	echo "<tr>";
	echo "<td>";
		echo "<select name='ship_vendor'><option value=''>-- 请选择 --</option>";
	$result = $con->query("select * from table_options where option_category ='ship_vendor'");	
	while ($row = mysqli_fetch_array($result)) {
		if($row['option_value']==$ship_vendor){
			$selectedcurrent='selected';
		}else{
			$selectedcurrent='';
		}
		echo "<option value=".$row['option_value']." ".$selectedcurrent.">".$row['option_value']."</option>";
}
$result->close();
	echo "</select></td>";
	echo "<td><input type='text' name='driver_item3' value='$driver_item3'></td><td></td><td rowspan='3'><input type='text' name='ship_biller' value='$ship_biller'></td><td rowspan='3' colspan='2'><input type='text' name='ship_date' class='tcal'  value='$ship_date' style='background:white;'></td><td style='background:#76b9ed;'>公式</td><td colspan='3'><select name='ship_formula'><option value=''>-- 请选择 --</option>";
	$result = $con->query("select * from table_options where option_category ='ship_formula'");	
	while ($row = mysqli_fetch_array($result)) {
		if($row['option_value']==$ship_formula){
			$selectedcurrent='selected';
		}else{
			$selectedcurrent='';
		}
		echo "<option value=".$row['option_value']." ".$selectedcurrent.">".$row['option_value']."</option>";
}
$result->close();		
	echo "</select></td></tr>";
	echo "<tr><td style='background:#76b9ed;'>派单人</td><td><input type='text' name='driver_item4' value='$driver_item4'></td><td></td><td rowspan='2' style='background:#76b9ed;'>总计人民币（大写）</td><td rowspan='2' colspan='3'><input type='text' name='caculated_price' value='$caculated_price'></td></tr>";
	echo "<tr><td><input type='text' name='sendorder_person' value='$sendorder_person'></td><td><input type='text' name='driver_item5' value='$driver_item5'></td><td></td></tr>";
	echo "</table>";
	echo " <input name='tj2' type='submit' value='订单修改' style='margin-left:50px;margin-top:30px;'>";
echo "</form>";
$con->closeDB();	