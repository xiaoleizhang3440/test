
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
</style>
<?php

/**
 * @Author: xiaolei.zhang2
 * @Date:   2017-12-19 22:45:00
 * @Last Modified by:   xiaolei.zhang2
 * @Last Modified time: 2018-01-25 23:59:46
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

echo "<h3>下拉选项添加</h3>";
echo "<hr>";

echo "<form action='configFormOptionProcessing.php' method='post'>";
$con=new li_mysql();
echo "名字: <input type='text' name='option_value'>";
echo "类别: <select name='option_category'><option value=''>-- 请选择 --</option>";
$result = $con->query("select * from table_category");
while ($row = mysqli_fetch_array($result)) {
	echo "<option value='".$row["category_code"]."'>".$row["category"]."</option>";
}

echo  "</select>";
	
echo "<input name='tj' type='submit' value=' 提 交 ' style='margin-left:50px;margin-top:30px;'><br/><br/> ";
echo "</form>";


echo "<div id='third' style='border:1px solid grey;width:100%;height:350;margin:-5px 10px 5px 10px;float:left;background-color:white;float:left;'>";

			$result = $con->query("select * from table_options");
			echo "<table border='1' width='100%''>";
			echo "<tr style='background-color:#76b9ed;'><td>名称</td><td>类别</td><td>删除</td></tr>";
			while ($row = mysqli_fetch_array($result)) {

switch ($row['option_category']) {
	case 'goods_name':
		$c_name="货物名称";
		break;
	case 'package_volume':
		$c_name="每件体积";
		break;
	case 'steel_type':
		$c_name="钢种";
		break;

	case 'vehicle_type':
		$c_name="需要车种";
		break;
	case 'from_where':
		$c_name="起运地";
		break;

	case 'to_where':
		$c_name="到达地";
		break;
	case 'delegate_item':
	$c_name="委托事项";
		break;
	case 'ship_formula':
		$c_name="公式";
		break;
	case 'ship_vendor':
		$c_name="承运商";
		break;
	default:
		$c_name=$row['option_category'];
		break;
}

				echo "<tr>";
				echo "<td>";
				echo @$row['option_value'];
				echo "</td>";
				echo "<td>";
				echo  $c_name;
				echo "</td>";
				echo "<td><a href=itemDel.php?id=".$row['Id'].">删除</a></td>";
			   // echo(@$row['option_value'] . " &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; " . $row['option_category']. "<br/>");
				echo "</tr>";
			}
			echo "</table>";
			$result->close();
			$con->closeDB();	

echo "</div>";
