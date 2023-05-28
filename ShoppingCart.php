<?php
	session_start();
	if(!isset($_SESSION['userName'])){
		header('Location:Login.php');
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>购物车</title>
		<link rel="stylesheet" href="Style.css"> 
	</head>
	<body>
		
		<?php
			include 'HeaderNav.php';
		?>
		

		<?php
			require_once 'Conn.php';
			mysqli_query($db,'set names utf8');
			
			$userName=$_SESSION['userName'];
			$productid=$_GET['productid'];
			$del=$_GET['del'];
			if(isset($del)){
				$sql="delete from cart Where Username='$userName' and ProductId='$productid'";
				$result=mysqli_query($db,$sql);
			}
			else{
				$sql="select * from cart Where UserName='$userName' and ProductId='$productid'";
				$result=mysqli_query($db,$sql);
				$rowcount=mysqli_num_rows($result);
				
				if($rowcount>=1){
					$sql="update cart set quantity = quantity +1 where Username='$userName' and ProductId='$productid'";
				}
				else{
					$sql="insert into cart select '$userName','$productid',Name,Price,1 from product where ProductId='$productid'";
				}
				$result=mysqli_query($db,$sql);
			}
			
			$sql="select * from cart where Username='$userName'";
			$result=mysqli_query($db,$sql);
			$rowcount=mysqli_num_rows($result);
			
			$sql="select SUM(Price*quantity) s FROM cart WHERE Username='$userName'";
			$result2=mysqli_query($db,$sql);
			$total=mysqli_fetch_assoc($result2);
			
			if($rowcount>=1){
				echo "<article>";
				echo "<table class='tb' style='width: 100%;'><tr><th>书籍名称</th><th>数量</th><th>单价</th><th>删除</th></tr>";
				
				while($td=mysqli_fetch_assoc($result)){
					echo "<tr><td>".$td['Name']."</td>";
					echo "<td>".$td['Quantity']."</td>";
					echo "<td>".$td['Price']."</td><td><a href='ShoppingCart.php?productid=".$td['ProductId']."&del=1'>删除</a><td></tr>";
				}
				echo "<tr><th></th><th>总价：</th><th>".$total['s']."</th><th></th></tr>";
				echo "</table>";
				
				echo "<li><a href=\"Index.php\">继续选购</a></li>";
				echo "<li><a href=\"CheckOut.php\">结算</a></li>";
				
				echo "</article>";
			}
		?>
		
		<?php
			include 'Footer.html';
		?>
		
	</body>
</html>
