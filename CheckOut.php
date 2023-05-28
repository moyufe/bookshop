<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>结算</title>
		<link rel="stylesheet" href="Style.css"> 
	</head>
	<body>
		<?php
			include 'HeaderNav.php';
		?>
		
		<?php
			echo "<div id='main'>";
			require_once 'Conn.php';
			mysqli_query($db,'set names utf8');
			
			session_start();
			$userName = $_SESSION['userName'];
			$check=$_GET['check'];
			
			if(isset($check)){
				echo "订单提交成功，感谢您的订购<br/>";
				echo "订单商品将开始配送,请保持您的联系方式畅通<br/>";
				echo "如对本订单有任何疑问，请联系我们的客服430880880<br/>";
				echo "网上书城团队<br/>";
			}else{
				$sql="select * from cart where Username='$userName'";
				$result=mysqli_query($db,$sql);
				$rowcount=mysqli_num_rows($result);
				
				$sql="select sum(Price*Quantity) s FROM cart WHERE Username='$userName'";
				$result2=mysqli_query($db,$sql);
				$total=mysqli_fetch_assoc($result2);
				if($rowcount>=1){
					
					echo "<table style='width: 80%;text-align: center; height: 150px' class='tb'><tr><th>书籍名称</th><th>数量</th><th>单价</th></tr>";
					while($row=mysqli_fetch_assoc($result)){
						echo "<tr><td>".$row['Name']."</td>";
						echo "<td>".$row['Quantity']."</td>";
						echo "<td>".$row['Price']."</td></tr>";
					}
					echo "<th><th>总价：</th><th>".$total['s']."</th><th></th></tr>";
					echo "</table>";
				}
				
				$sql="select * from account WHERE Username='$userName'";
				$result=mysqli_query($db,$sql);
				$row=mysqli_fetch_assoc($result);
				echo "<table class='tb' style='width: 30%; height: 150px;margin: 10px 100px;'>";
				echo "<tr><td>姓名：</td><td>".$row["Cname"]."</td></tr>";
				echo "<tr><td>国家：</td><td>".$row["Country"]."</td></tr>";
				echo "<tr><td>省份：</td><td>".$row["Province"]."</td></tr>";
				echo "<tr><td>城市：</td><td>".$row["City"]."</td></tr>";
				echo "<tr><td>地址：</td><td>".$row["Address"]."</td></tr>";
				echo "<tr><td>邮编：</td><td>".$row["Zip"]."</td></tr>";
				echo "<tr><td>电话：</td><td>".$row["Phone"]."</td></tr>";
				echo "</table>";
				echo "<p style='margin:20px auto; text-align: center;'><a href='CheckOut.php?check=1' >提交订单</a></p>";
				mysqli_free_result($result);
				mysqli_free_result($result2);
				mysqli_close($db);
			}
			echo "</div>";
		?>
		
		<?php
			include 'Footer.html';
		?>
	</body>
</html>
