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
			mysqli_query($db,'set names utf8');
			$sql="select * from Category;";
			$result=mysqli_query($db,$sql);
			$str="<article>";
			$str.="<table border='0' cellspacing='0' cellpadding='0'>";
			
			$i=0;
			while($td=mysqli_fetch_assoc($result)){
				if($i%4==0){
					$str.="<tr>";
				}
				
				$str.="<td><a href='Products.php?cateid=".$td["CategoryId"]."'><img src='Images\\".$td['Image']."'><p>".$td["Name"]."</p></a></td>";
				
				if(($i+1)%4==0){
					$str.="</tr>";
				}
				$i++;
			}
			$str.="</table></article>";
			echo $str;
				// 		<tr>
				// 			<td><a href=''><img src='Images/wx.jpg' ><p>文学类</p></a></td>
				// 			<td><a href=''><img src='Images/jj.jpg' ><p>经济类</p></a></td>
				// 			<td><a href=''><img src='Images/it.jpg' ><p>IT类</p></a></td>
				// 			<td><a href=''><img src='Images/xs.jpg' ><p>小说类</p></a></td>
				// 		</tr>
				// 		<tr><td><img src='./Images/jy.jpg' ><p>教育类</p></td></tr>;
			
		?>
		<?php
			include 'Footer.html';
		?>
	</body>
</html>
