<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
		<title></title>
		<link rel="stylesheet" href="Style.css"> 
	</head>
	<body>
<?php
	include 'HeaderNav.php';
?>

<?php
	require_once 'Conn.php';
	$cateid=$_GET['cateid'];
	$page=$_GET['page'];
	
	$perNumber=3;
	
	$sql="select * from Product where Categoryid=$cateid";
	
	$result=mysqli_query($db,$sql);
	$rowcount=mysqli_num_rows($result);
	$totalPage=ceil($rowcount/$perNumber);

	if(!isset($page)){
		$page=1;
	}
	$startnum=($page-1)*$perNumber;
	$sqlview="select * from Product where Categoryid=$cateid limit $startnum,$perNumber";
	$result=mysqli_query($db,$sqlview);
	
	if($rowcount>=1){
		echo "<article>";
		
		echo "<table style='width:100%' align=center>";
		echo "<tr><th width='12%'>名称</th><th width='48%'>描述</th><th width='20%'>图片</th><th width='10%'>价格</th><th width='10%'>加入购物车</th></tr>";

		while($td=mysqli_fetch_assoc($result)){
			echo "<tr><td>".$td["Name"]."</td><td>".$td["Descn"]."</td><td><img src='images/".$td["Image"]."' height=120px width=80px></td><td>".$td["Price"]."</td><td><a href='ShoppingCart.php?productid=".$td["ProductId"]."'>加入购物车</a></td></tr>";
		}
		echo "</table>";
		
		echo "<div style='text-align: center;'>";
		if($page>1){
			echo "<a href='Products.php?cateid=".$cateid."&page=".($page-1)."'>上一页</a>"."&nbsp;&nbsp;";
		}
		for($i=1;$i<=$totalPage;$i++){
			echo "<a href='Products.php?cateid=".$cateid."&page=".$i."'>".$i."</a>&nbsp;&nbsp;";
		}
		if($page<$totalPage){
			echo "<a href='Products.php?cateid=".$cateid."&page=".($page+1)."'>下一页</a>";
		}
		echo "</div>";
		echo "</article>";
	}
	mysqli_free_result($result);
	mysqli_close($db);
?>

<?php
	include 'Footer.html';
?>
</body>
</html>