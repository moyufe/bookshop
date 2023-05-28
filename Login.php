<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" href="Style.css">
		<style type="text/css">
			#login{
				text-align: center;
				line-height: 50px;
			}
			h1{
				text-align: center;
				margin-top: 20px;
			}
			
		</style>
	</head>
	<body>
		<?php
			include 'HeaderNav.php';
		?>
		<h1>用户登录</h1>
		<form action="Login.php" method="post" enctype="multipart/form-data">
			<div id="login">
				<div>
					用户名:<input type="text" name="userName" />
				</div>
				<div>
					密码:<input type="password" name="pwd" />
				</div>
				<div>
					<input type="submit" name="btnSubmit" value="登录">
				</div>
			</div>
		</form>
		<?php
			if(isset($_POST["btnSubmit"])){
				$userName=$_POST["userName"];
				$pwd=$_POST["pwd"];
				require_once 'Conn.php';
		
				$sql="select * from Account where Username='$userName' and Password='$pwd'";
				$result=mysqli_query($db,$sql);
				$rowcount=mysqli_num_rows($result);
				if($rowcount>=1){
					session_start();
					$_SESSION['userName']=$_POST["userName"];
					setcookie("userName",$_POST["userName"],time()+60*60*24*30);
					echo "<script>window.alert('登陆成功！');</script>";
					header("location:Index.php");
				}else{
					echo "<script>window.alert('用户名或者密码错误！');</script>";
				}
			}
		?>
		
		<?php
			include 'Footer.html';
		?>
	</body>
</html>
