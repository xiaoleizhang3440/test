

<style>
	input{
		width: 110px;
	}
	h3{
			font-size: 20px;
			background-image: url('images/vertical.png');
			background-repeat: repeat-x;
			height: 82px;
		}
		a{
			display: block;
			float: right;
		}
</style>
<?php

/**
 * @Author: xiaolei.zhang2
 * @Date:   2017-12-22 22:49:21
 * @Last Modified by:   xiaolei.zhang2
 * @Last Modified time: 2018-01-31 01:53:03
 */
error_reporting(0);
header("Content-type: text/html; charset=utf-8"); 
session_start();
if($_SESSION["user_name"]!=''){
    //echo "已经登陆";
}else{
   echo "没有登录, <a href='login.php'>登录</a>";
   exit();
}
require_once("./conn/conn.php");

echo "<h3>单据列表</h3>";
echo "<hr><br/>";

echo "<form action='configFormList.php' method='post'>";
echo "单号:<input type='text' name='consignment_ID'>&nbsp;";
echo "时间段： <input type='text' name ='startime'> -- <input type='text' name='endtime'>&nbsp;";
echo "承运商:<input type='text' name='ship_vendor'>&nbsp;";
echo "生产单位:<input type='text' name='factory_vendor'>&nbsp;";
echo "起运点-到达点:<input type='text' name='from_where'> -- <input type='text' name='to_where'>&nbsp;";
echo "<input type='submit' value='查询'>";
echo "</form><br/><br/>";
$consignment_ID ='';
$con=new li_mysql();
$sql_conditions="";
if($_POST['consignment_ID']!=''){
	$consignment_ID =trim($_POST["consignment_ID"]);
	$sql_conditions=$sql_conditions." and consignment_ID ='$consignment_ID' ";
	$_SESSION['consignment_ID']=$consignment_ID;
}
if($_POST['ship_vendor']!=''){
	$ship_vendor =trim($_POST["ship_vendor"]);
	$sql_conditions=$sql_conditions." and ship_vendor ='$ship_vendor' ";
	$_SESSION['ship_vendor']=$ship_vendor;
}
if($_POST['factory_vendor']!=''){
	$factory_vendor=trim($_POST["factory_vendor"]);
	$sql_conditions=$sql_conditions." and delegate_unit='$factory_vendor'";
	$_SESSION['factory_vendor']=$factory_vendor;
}
if($_POST['startime']!=''){
	$startime=trim($_POST["startime"]);
	$sql_conditions=$sql_conditions." and create_time>='$startime'";
	$_SESSION['startime']=$startime;	
}
if($_POST['endtime']!=''){
	$endtime=trim($_POST["endtime"]);
	$sql_conditions=$sql_conditions." and create_time<='$endtime'";	
	$_SESSION['endtime']=$endtime;
}
if($_POST['from_where']!=''){
	$from_where=trim($_POST["from_where"]);
	$sql_conditions=$sql_conditions." and from_where ='$from_where'";	
	$_SESSION['from_where']=$from_where;
}
if($_POST['to_where']!=''){
	$to_where=trim($_POST["to_where"]);
	$sql_conditions=$sql_conditions." and to_where ='$to_where'";	
	$_SESSION['to_where']=$to_where;
}


if($_GET['consignment_ID']!=''){
	$consignment_ID =trim($_GET["consignment_ID"]);
	$sql_conditions=$sql_conditions." and consignment_ID ='$consignment_ID' ";
	$_SESSION['consignment_ID']=$consignment_ID;
}
if($_GET['ship_vendor']!=''){
	$ship_vendor =trim($_GET["ship_vendor"]);

	$sql_conditions=$sql_conditions." and ship_vendor ='$ship_vendor' ";
	$_SESSION['ship_vendor']=$ship_vendor;
}
if($_GET['factory_vendor']!=''){
	$factory_vendor=trim($_GET["factory_vendor"]);
	$sql_conditions=$sql_conditions." and delegate_unit='$factory_vendor'";
	$_SESSION['factory_vendor']=$factory_vendor;
}
if($_GET['startime']!=''){
	$startime=trim($_GET["startime"]);
	$sql_conditions=$sql_conditions." and create_time>='$startime'";	
	$_SESSION['startime']=$startime;	
}
if($_GET['endtime']!=''){
	$endtime=trim($_GET["endtime"]);
	$sql_conditions=$sql_conditions." and create_time<='$endtime'";	
	$_SESSION['endtime']=$endtime;
}
if($_GET['from_where']!=''){
	$from_where=trim($_GET["from_where"]);
	$sql_conditions=$sql_conditions." and from_where ='$from_where'";
	$_SESSION['from_where']=$from_where;	
}
if($_GET['to_where']!=''){
	$to_where=trim($_GET["to_where"]);
	echo $to_where;
	$sql_conditions=$sql_conditions." and to_where ='$to_where'";	
	$_SESSION['to_where']=$to_where;
}





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
	echo "<td>是否完成</td>";
	echo "<td>打印</td>";
	echo "<td>编辑</td>";
echo "</tr>";

if($consignment_ID =='' &&  $ship_vendor=='' && $factory_vendor=='' && $startime=='' && $endtime == '' &&  $from_where=='' &&  $to_where=='' ){
	echo "请输入搜索条件";
	exit();
}



$_SESSION['sql']="select * from table_form where 1=1  ".$sql_conditions."   order by Id asc";

$result = $con->query("select * from table_form where 1=1  ".$sql_conditions."   order by Id asc");
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

		if($row["order_status"]==0){
		echo "<td><a href='configFormConfirm.php?id=$id&consignment_ID=$consignment_ID&ship_vendor=$ship_vendo&factory_vendor=$factory_vendor&startime=$startime&endtime=$endtime&from_where=$from_where&to_where=$to_where' style='color:black;'>";

		echo "确认完成";

		echo "</a>";
		echo "</td>";

		}else{
			echo "<td>";
			echo "已完成";
			echo "</td>";
		}
		
		echo "<td><a href='configForm.php?id=$id' style='color:black;'>打印</a></td>";
		if($row["order_status"]==0){
			echo "<td><a href='configFormEdit.php?id=$id&consignment_ID=$consignment_ID&ship_vendor=$ship_vendo&factory_vendor=$factory_vendor&startime=$startime&endtime=$endtime&from_where=$from_where&to_where=$to_where' style='color:black;'>编辑</a></td>";
		}else{
			echo "<td></td>";
		}
	echo "</tr>";
	$i++;
}
$result->close();

$_SESSION['sql2']="select sum(caculated_price) from table_form where 1=1  ".$sql_conditions." ";

$result = $con->query("select sum(caculated_price) from table_form where 1=1  ".$sql_conditions." ");
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
	echo "<td></td>";
echo "</tr>";



echo "</table>";
echo "<br/>";
	echo "<a href='excel.php'>导出当前数据</a>";

/*$result = $con->query("select * from table_form  WHERE 1=1 ".$sql_conditions." order by id desc");
	echo "<ul>";
	while ($row = mysqli_fetch_array($result)) {
		echo "<li>".$row['consignment_ID']."    &nbsp;&nbsp;".$row['goods_name']."&nbsp;&nbsp;&nbsp;<a href=configFormView.php?id=".$row['Id'].">查看</a>&nbsp;&nbsp; <a href=configFormEdit.php?id=".$row['Id'].">编辑</a></li><br/><br/>";
}
	echo "</ul>";
	*/
									
