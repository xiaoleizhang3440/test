<?php

/**
 * @Author: xiaolei.zhang2
 * @Date:   2018-01-20 22:32:28
 * @Last Modified by:   xiaolei.zhang2
 * @Last Modified time: 2018-01-21 18:25:56
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

$filename = "data".time().".xls";  
header('Content-Type: application/octet-stream');  
header('Content-Disposition: attachment; filename=' . $filename);  


echo "<table border=1 width=100%>";
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
	echo "<td>单价/包车</td>";
	echo "<td>总金额</td>";
	echo "<td>承运商</td>";
	echo "<td>车型</td>";
	echo "<td>车吨位</td>";
	echo "<td>配工人</td>";
	echo "<td>派单人</td>";

echo "</tr>";

$sql=$_SESSION['sql'];
$con=new li_mysql();
$result = $con->query($sql);
$i=1;
while ($row = mysqli_fetch_array($result)){
	echo "<tr>";
		echo "<td>".$i."</td>";
		echo "<td>".$row["consignment_ID"]."</td>";
		echo "<td>".$row["create_time"]."</td>";
		echo "<td>".$row["delegate_unit"]."</td>";
		echo "<td>".$row["delegate_person"]."</td>";
		echo "<td>".$row["from_where"]."</td>";
		echo "<td>".$row["to_where"]."</td>";
		echo "<td>".$row["goods_name"]."</td>";
		echo "<td>".$row["delegate_num"]."</td>";
		echo "<td>".$row["vehicle_num"]."</td>";
		echo "<td>".$row["caculated_price"]."</td>";
		echo "<td>".$row["ship_vendor"]."</td>";
		echo "<td>".$row["vehicle_type"]."</td>";
		echo "<td>".$row["vehicle_weight"]."</td>";
		echo "<td>".$row["driver_comment1"]."</td>";
		echo "<td>".$row["sendorder_person"]."</td>";
		$id=$row["Id"];

	echo "</tr>";
	$i++;
}
$result->close();

$sql=$_SESSION['sql2'];
$result = $con->query($sql);
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

echo "</tr>";



echo "</table>";



