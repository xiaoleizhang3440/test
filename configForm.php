
<style>
	input{
		width: 100px;
	}
	h3{
			font-size: 20px;
			background-image: url('images/vertical.png');
			background-repeat: repeat-x;
			height: 40px;
		}
		hr{
			margin-top: 5px;
		}
		a{
			color: red;
		}
		.editinput{
			width: 40px;
		}
		.editinput{
			width: 60px;
		}


</style>

<link rel="stylesheet" type="text/css" href="tcal.css" />
<script type="text/javascript" src="tcal.js"></script> 
<script>
	
	function D(di){
		document.getElementById("c"+di).style.display='none';
		document.getElementById("d"+di).style.display='block';

		document.getElementById("e"+di).style.display='none';
		document.getElementById("fy"+di).style.display='block';

		document.getElementById("g"+di).style.display='none';
		document.getElementById("h"+di).style.display='block';

		document.getElementById("i"+di).style.display='none';
		document.getElementById("j"+di).style.display='block';

		document.getElementById("l"+di).style.display='none';
		document.getElementById("m"+di).style.display='block';

		document.getElementById("o"+di).style.display='none';
		document.getElementById("p"+di).style.display='block';

		document.getElementById("r"+di).style.display='none';
		document.getElementById("s"+di).style.display='block';

		document.getElementById("t"+di).style.display='none';
		document.getElementById("u"+di).style.display='block';

		document.getElementById("v"+di).style.display='none';
		document.getElementById("w"+di).style.display='block';

		document.getElementById("x"+di).style.display='none';
		document.getElementById("y"+di).style.display='block';

		document.getElementById("z"+di).style.display='none';
		document.getElementById("ab"+di).style.display='block';

		document.getElementById("ac"+di).style.display='none'
		document.getElementById("ad"+di).style.display='block';

		//document.getElementById("ae"+di).style.display='none';
		//document.getElementById("af"+di).style.display='block';

		document.getElementById("edit_change_submit"+di).innerHTML="<a onclick=document.getElementById('f"+di+"').submit();><p style='cursor:pointer;'>提交</p></a>";


	}

</script>
<?php 
	if(!empty($_GET["id"])){
		$windowOpenURL= "configFormView.php?id=".$_GET["id"];
?>
<script type="text/javascript">

	window.onload=function() {
		window.open('<?php echo $windowOpenURL?>','newwindow', 'height=400, width=1200, top=300, left=300, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');
	}

</script>
<?php
}

/**
 * @Author: xiaolei.zhang2
 * @Date:   2017-12-19 22:45:00
 * @Last Modified by:   xiaolei.zhang2
 * @Last Modified time: 2018-01-31 00:56:23
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

echo "<h3>委托单配置</h3>";
echo "<hr>";


$con=new li_mysql();
$result = $con->query("select count(*) from table_form where date_format(create_time,'%Y-%m-%d') ='".date("Y-m-d")."'");
$row = mysqli_fetch_array($result);
$s=$row[0]+1;

$consignment_ID = date("Ymd")."-".$s;

$result->close();

echo "<form action='configFormProcessing.php' method='post'>";
	echo "<table border='1' cellspacing='3' cellpadding='0' width='100%' height='400px' >";
	echo "<tr style='background:#76b9ed;height='30px;'><td>委托单号</td><td>品名</td><td>合同号</td><td>件数</td><td>每件体积</td><td>钢种</td><td>数量（吨）</td><td>车型</td><td>需要车辆数</td><td>收货部门留言</td></tr>";

	$result = $con->query("select * from table_options where option_category ='goods_name'");
	echo "<tr><td ><a href=#>".$consignment_ID ."</a><input type='hidden' name='consignment_ID' value='$consignment_ID'></td><td><select name='goods_name'>";
	echo "<option value=''>-- 请选择 --</option>";
	while ($row = mysqli_fetch_array($result)) {
		echo "<option value=".$row['option_value'].">".$row['option_value']."</option>";
}
$result->close();
	echo "</select></td>";
	echo "<td><input type='text' name='contract_num'></td><td><input type='text' name='package_num'></td>";
	echo "<td><select name='package_volume'>";
	echo "<option value=''>-- 请选择 --</option>";
	$result = $con->query("select * from table_options where option_category ='package_volume'");	
	while ($row = mysqli_fetch_array($result)) {
		echo "<option value=".$row['option_value'].">".$row['option_value']."</option>";
}
$result->close();
	echo "</select></td>";
	echo "<td><select name='steel_type'><option value=''>-- 请选择 --</option>";
	$result = $con->query("select * from table_options where option_category ='steel_type'");	
	while ($row = mysqli_fetch_array($result)) {
		echo "<option value=".$row['option_value'].">".$row['option_value']."</option>";
}
$result->close();	
	echo "</select></td><td><input type='text' name='delegate_num'></td><td><select name='vehicle_type'>";
	echo "<option value=''>-- 请选择 --</option>";
	$result = $con->query("select * from table_options where option_category ='vehicle_type'");	
	while ($row = mysqli_fetch_array($result)) {
		echo "<option value=".$row['option_value'].">".$row['option_value']."</option>";
}
$result->close();		
	echo "</select></td><td><input type='text' name='vehicle_amount'></td><td><input type='text' name='receiver_comment'></td></tr>";
	echo "<tr style='background:#76b9ed;'><td>委托单位</td><td>起运地</td><td>到达地</td><td>委托事项</td><td>单价/包车</td><td>车次</td><td>公里</td><td>车吨</td><td>运输起止时间(24小时计)</td><td>调度留言</td></tr>";
	echo "<tr><td>";


	echo "<select name='delegate_unit'>";
	echo "<option value=''>-- 请选择 --</option>";
	$result = $con->query("select * from table_options where option_category ='delegate_unit'");	
	while ($row = mysqli_fetch_array($result)) {
		echo "<option value=".$row['option_value'].">".$row['option_value']."</option>";
}
$result->close();	



	echo "</td><td><select name='from_where'><option value=''>-- 请选择 --</option>";
	$result = $con->query("select * from table_options where option_category ='from_where'");	
	while ($row = mysqli_fetch_array($result)) {
		echo "<option value=".$row['option_value'].">".$row['option_value']."</option>";
}
$result->close();	
	echo "</select></td><td><select name='to_where'><option value=''>-- 请选择 --</option>";
	$result = $con->query("select * from table_options where option_category ='to_where'");	
	while ($row = mysqli_fetch_array($result)) {
		echo "<option value=".$row['option_value'].">".$row['option_value']."</option>";
}
$result->close();		
	echo "</select></td><td><select name='delegate_item'><option value=''>-- 请选择 --</option>";
	$result = $con->query("select * from table_options where option_category ='delegate_item'");	
	while ($row = mysqli_fetch_array($result)) {
		echo "<option value=".$row['option_value'].">".$row['option_value']."</option>";
}
$result->close();	
	echo "</select></td><td>";

	echo "<select name='vehicle_num'>";
	echo "<option value=''>-- 请选择 --</option>";
	$result = $con->query("select * from table_options where option_category ='unit_price'");	
	while ($row = mysqli_fetch_array($result)) {
		echo "<option value=".$row['option_value'].">".$row['option_value']."</option>";
}
$result->close();

	echo "</td><td><input type='text' name='vehicle_trips'></td><td><input type='text' name='kilo_meter'></td><td><input type='text' name='vehicle_weight'></td><td><input type='text' name='vehicle_starttime'> <a href=#>--</a> <input type='text' name='vehicle_endtime'></td><td><input type='text' name='dispatch_comment'></td></tr>";
	echo "<tr style='background:#76b9ed;'><td>委托人</td><td>驾驶员</td><td>备注</td><td>吨公里</td><td>倾斜次</td><td>货物等级</td><td>计费项目</td><td>计费重量</td><td>单价</td><td>金额</td></tr>";
	echo "<tr><td>";


	echo "<select name='delegate_person'>";
	echo "<option value=''>-- 请选择 --</option>";
	$result = $con->query("select * from table_options where option_category ='delegate_person'");	
	while ($row = mysqli_fetch_array($result)) {
		echo "<option value=".$row['option_value'].">".$row['option_value']."</option>";
}
$result->close();


	echo "</td><td><input type='text' name='driver_item1'></td><td ><input type='text' name='driver_comment1'></td><td><input type='text' name='ton_num'></td><td><input type='text' name='dump_num'></td><td><input type='text' name='goods_level'></td><td style='background:#76b9ed;'>运输单价</td><td><input type='text' name='cost_ship_weight'></td><td><input type='text' name='cost_ship_unitprice'></td><td><input type='text' name='cost_ship_gross'></td></tr>";
	echo "<tr><td style='background:#76b9ed;'>承运商</td><td><input type='text' name='driver_item2'></td><td></td><td style='background:#76b9ed;'>开单人</td><td colspan='2' style='background:#76b9ed;'>开账日期</td><td style='background:#76b9ed;'>装卸费</td><td><input type='text' name='cost_dump_weight'></td><td><input type='text' name='cost_dump_unitprice'></td><td><input type='text' name='cost_dump_gross'></td></tr>";
	echo "<tr><td>";
	echo "<select name='ship_vendor'><option value=''>-- 请选择 --</option>";
	$result = $con->query("select * from table_options where option_category ='ship_vendor'");	
	while ($row = mysqli_fetch_array($result)) {
		echo "<option value=".$row['option_value'].">".$row['option_value']."</option>";
}
$result->close();
	echo "</select></td><td><input type='text' name='driver_item3'></td><td></td><td rowspan='3'>";


	echo "<select name='ship_biller'>";
	echo "<option value=''>-- 请选择 --</option>";
	$result = $con->query("select * from table_options where option_category ='biller_person'");	
	while ($row = mysqli_fetch_array($result)) {
		echo "<option value=".$row['option_value'].">".$row['option_value']."</option>";
}
$result->close();


	echo "</td><td rowspan='3' colspan='2'><input type='text' name='ship_date' class='tcal' value='点击选择'  style='background:white;'></td><td style='background:#76b9ed;'>公式</td><td colspan='3'><select name='ship_formula'><option value=''>-- 请选择 --</option>";
	$result = $con->query("select * from table_options where option_category ='ship_formula'");	
	while ($row = mysqli_fetch_array($result)) {
		echo "<option value=".$row['option_value'].">".$row['option_value']."</option>";
}
$result->close();		
	echo "</select></td></tr>";
	echo "<tr ><td style='background:#76b9ed;'>派单人</td><td><input type='text' name='driver_item4'></td><td></td><td rowspan='2' style='background:#76b9ed;'>总计人民币（大写）</td><td rowspan='2' colspan='3'><input type='text' name='caculated_price'></td></tr>";
	echo "<tr><td><input type='text' name='sendorder_person'></td><td><input type='text' name='driver_item5'></td><td></td></tr>";
	echo "</table>";
	echo " <input name='tj2' type='submit' value='订单生成' style='margin-left:50px;margin-top:10px;'>";
echo "</form>";


echo "<table border=1 width=110%>";
echo "<tr style='background-color:#76b9ed;'>";
	echo "<td>序号</td>";
	echo "<td>委托单号</td>";
	echo "<td>日期</td>";
	echo "<td>委托单位</td>";
	echo "<td>委托人</td>";
	echo "<td>起运地点</td>";
	echo "<td>终到站点</td>";
	echo "<td>品名</td>";
	echo "<td>数量(吨)</td>";
	echo "<td>运输单价</td>";
	echo "<td>总金额</td>";
	echo "<td>单价包车</td>";
	echo "<td>承运商</td>";
	echo "<td>车吨位</td>";
	echo "<td>配工人</td>";

	echo "<td>编辑</td>";
	echo "<td>打印</td>";
	echo "<td>删除</td>";
echo "</tr>";

$result = $con->query("select * from table_form where date_format(create_time,'%Y-%m-%d') ='".date("Y-m-d")."'  order by Id asc");
$i=1;

while ($row = mysqli_fetch_array($result)){
	$sd=$row['from_where'];
	$f="f".$i;
	echo "<form action='configFormUpdateProcessing.php' method='post' name='f' id='$f'>";
	echo "<tr>";
		echo "<td>".$i."<input type='hidden' value='".$i."' name='i'></td>";
		echo "<td>".$row["consignment_ID"]."<input type='hidden' value='".$row["consignment_ID"]."' name='consignment_ID_edit".$i."'></td>";
		echo "<td><div id='ae".$i."'>".date("Y-m-d",strtotime($row["create_time"]))."</div><div id='af".$i."' style='display:none;'><input type='text' name='create_time_edit".$i."' value='".$row["create_time"]."' class='tcal'></div></td>";

		echo "<td><div id='c".$i."'>".$row["delegate_unit"]."</div><div id='d".$i."' style='display:none;'><input type='text' name='delegate_unit_edit".$i."' value='".$row["delegate_unit"]."'></div></td>";

		echo "<td><div id='e".$i."'>".$row["delegate_person"]."</div><div id='fy".$i."' style='display:none;'><input type='text' name='delegate_person_edit".$i."' value='".$row["delegate_person"]."'></div></td>";

		echo "<td><div id='g".$i."'>".$row["from_where"]."</div><div id='h".$i."' style='display:none;'><select name='from_where_edit".$i."'><option value=''>-- 请选择 --</option>";
			$result2 = $con->query("select * from table_options where option_category ='from_where'");	
			while ($row2 = mysqli_fetch_array($result2)) {
				if($row2['option_value']==$sd){
					$sl="selected";
				}else{
					$sl="";
				}
				echo "<option value=".$row2['option_value']." ".$sl." >".$row2['option_value']."</option>";
			}
			$result2->close();
		echo "</select></div></td>";

		echo "<td><div id='i".$i."'>".$row["to_where"]."</div><div id='j".$i."' style='display:none;'><select name='to_where_edit".$i."'><option value=''>-- 请选择 --</option>";
			$result2 = $con->query("select * from table_options where option_category ='to_where'");	
			while ($row2 = mysqli_fetch_array($result2)) {
				if($row2['option_value']==$row["to_where"]){
					$sl="selected";
				}else{
					$sl="";
				}
				echo "<option value=".$row2['option_value']." ".$sl." >".$row2['option_value']."</option>";
			}
			$result2->close();
		echo "</select></div></td>";


		echo "<td><div id='l".$i."'>".$row["goods_name"]."</div><div id='m".$i."' style='display:none;'><select name='goods_name_edit".$i."'><option value=''>-- 请选择 --</option>";
			$result2 = $con->query("select * from table_options where option_category ='goods_name'");	
			while ($row2 = mysqli_fetch_array($result2)) {
				if($row2['option_value']==$row["goods_name"]){
					$sl="selected";
				}else{
					$sl="";
				}
				echo "<option value=".$row2['option_value']." ".$sl." >".$row2['option_value']."</option>";
			}
			$result2->close();


		echo "</select></div></td>";
		echo "<td><div id='o".$i."'>".$row["delegate_num"]."</div><div id='p".$i."' style='display:none;'><input type='text' class='editinput' name='delegate_num_edit".$i."' value='".$row["delegate_num"]."'></div></td>";


		echo "<td><div id='r".$i."'>".$row["cost_ship_unitprice"]."</div><div id='s".$i."' style='display:none;'>";		
		echo "<input type='text'  class='editinput'  name='cost_ship_unitprice_edit".$i."' value='".$row["cost_ship_unitprice"]."'></div></td>";


		echo "<td><div id='t".$i."'>".$row["caculated_price"]."</div><div id='u".$i."' style='display:none;'><input type='text' class='editinput' name='caculated_price_edit".$i."' value='".$row["caculated_price"]."'></div></td>";

		echo "<td><div id='v".$i."'>".$row["vehicle_num"]."</div><div id='w".$i."' style='display:none;'><select name='vehicle_num_edit".$i."'><option value=''>-- 请选择 --</option>";

			$result2 = $con->query("select * from table_options where option_category ='unit_price'");	
			while ($row2 = mysqli_fetch_array($result2)) {
				if($row2['option_value']==$row["vehicle_num"]){
					$sl="selected";
				}else{
					$sl="";
				}
				echo "<option value=".$row2['option_value']." ".$sl." >".$row2['option_value']."</option>";
			}
			$result2->close();

		echo "</select></div></td>";


		echo "<td><div id='x".$i."'>".$row["ship_vendor"]."</div><div id='y".$i."' style='display:none;'><select name='ship_vendor_edit".$i."'><option value=''>-- 请选择 --</option>";

			$result2 = $con->query("select * from table_options where option_category ='ship_vendor'");	
			while ($row2 = mysqli_fetch_array($result2)) {
				if($row2['option_value']==$row["ship_vendor"]){
					$sl="selected";
				}else{
					$sl="";
				}
				echo "<option value=".$row2['option_value']." ".$sl." >".$row2['option_value']."</option>";
			}
			$result2->close();

		echo "</select></div></td>";


		echo "<td><div id='z".$i."'>".$row["vehicle_weight"]."</div><div id='ab".$i."' style='display:none;'><input type='text' class='editinput' name='vehicle_weight_edit".$i."' value='".$row["vehicle_weight"]."'></div></td>";


		echo "<td><div id='ac".$i."'>".$row["driver_comment1"]."</div><div id='ad".$i."' style='display:none;'><input type='text' class='editinput2' name='driver_comment1_edit".$i."' value='".$row["driver_comment1"]."'></div></td></td>";
	
		$id=$row["Id"];
		if($row["order_status"]==0){
			echo "<td><div id='edit_change_submit".$i."'><a onclick='D(".$i.");' style='color:black;cursor:pointer;'>编辑</a></div></td>";
		}else{
			echo "<td></td>";
		}
		echo "<td><a href='configForm.php?id=$id' style='color:black;'>打印</a></td>";
		echo "<td><a href='configFormDel.php?id=$id' style='color:black;'>删除</a></td>";
	echo "</tr>";
	$i++;
	echo "</form>";
	
}
$result->close();



$result = $con->query("select sum(caculated_price) from table_form where date_format(create_time,'%Y-%m-%d') ='".date("Y-m-d")."'");
$row = mysqli_fetch_array($result);
$sumPrice=$row[0];

echo "<tr style='background-color:#76b9ed;'>";
	echo "<td></td>";
	echo "<td></td>";
	echo "<td></td>";
	echo "<td></td>";
	echo "<td></td>";
	echo "<td></td>";
	echo "<td></td>";
	echo "<td></td>";
	echo "<td></td>";
	echo "<td>总金额：</td>";
	echo "<td>".round($sumPrice,2)."</td>";
	echo "<td></td>";
	echo "<td></td>";
	echo "<td></td>";
	echo "<td></td>";
	echo "<td></td>";

	echo "<td></td>";
	echo "<td></td>";
echo "</tr>";



echo "</table>";



$con->closeDB();	