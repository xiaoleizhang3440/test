
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
 * @Date:   2018-01-22 14:24:05
 * @Last Modified by:   xiaolei.zhang2
 * @Last Modified time: 2018-01-27 15:46:40
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

echo "<h3>大类添加</h3>";
echo "<hr><br/>";

echo "<form action='configCategoryProcessing.php' method='post'>";

echo "下拉菜单名称： <input type='text' name='category'>&nbsp;&nbsp;";
echo "数据库code： <input type='text' name='category_code'>&nbsp;&nbsp;";
echo "<input type='submit' name='sb' value='提交'><br/><br/>";

echo "<table border='1' cellspacing='3' cellpadding='0' width='100%'>";
echo "<tr style='background-color:#76b9ed;'>";
	echo "<td>";
	echo "序号";
	echo "</td>";

	echo "<td>";
	echo "名称";
	echo "</td>";

	echo "<td>";
	echo "Code";
	echo "</td>";
	echo "<td>";
	echo "删除";
	echo "</td>";
echo "</tr>";
	$con=new li_mysql();
	$i=1;
	$result = $con->query("select * from table_category where 1=1 order by Id desc");
	while ($row = mysqli_fetch_array($result)){

echo "<tr >";
	echo "<td>";
	echo "$i";
	echo "</td>";

	echo "<td>";
	echo $row['category'];
	echo "</td>";

	echo "<td>";
	echo $row['category_code'];
	echo "</td>";
	echo "<td>";
	echo "<a href='categoryDel.php?id=".$row["Id"]."'>删除</a>";
	echo "</td>";
echo "</tr>";
	$i++;
}



echo "</table>";

echo "</form>";



