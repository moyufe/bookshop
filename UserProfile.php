<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>用户注册</title>
		<link rel="stylesheet" href="Style.css">
		<style type="text/css">
			h1{
				text-align: center;
				margin-top: 20px;
			}
			#reg{
				width: 370px;
				border: 1px solid blue;
				line-height: 40px;
				margin: 20px auto;
				padding-left: 100px;
				padding-top: 15px;
				padding-bottom: 15px;
				text-align: left;
				font-size: 14px;
			}
			.error{
				color: red;
			}
		</style>
	</head>
	<body>
		<?php
			include 'HeaderNav.php';
		?>
		<h1>用户信息</h1>
		
		<?php
			require_once 'Conn.php';		//链接数据库
			$sql="select * FROM account WHERE Username = '".$_COOKIE['userName']."'";
			$result=mysqli_query($db,$sql);		//获取用户的信息
			$sz=mysqli_fetch_assoc($result);	//以关联数组返回结果集
			
			// echo "<pre>";
			// var_dump($sz);
			// echo "</pre>";
			
			$userName=$sz['Username'];			//获取数组的值
			$password=$sz['Password'];
			$cname=$sz['Cname'];			
			$country=$sz['Country'];
			$province=$sz['Province'];
			$city=$sz['City'];
			$address=$sz['Address'];
			$zip=$sz['Zip'];
			$phone=$sz['Phone'];
			$email=$sz['Email'];
			
			$str="";
			
			$str.="<form action='UserProfiletj.php' method='post'>
				<div id='reg'>
					<div>
						姓名: <input type='text' name='cName'  value='".$cname."' />
					</div>
					<div>
						国家: <input type='text' name='country' value='".$country."' />
					</div>
					<div>
						省份: <input type='text' name='province' value='".$province."' />
					</div>
					<div>
						城市: <input type='text' name='city' value='".$city."' />
					</div>
					<div>
						地址: <input type='text' name='address' value='".$address."' />
					</div>
					<div>
						邮编: <input type='text' name='zip' value='".$zip."' />
					</div>
					<div>
						手机: <input type='text' name='phone' value='".$phone."' />
					</div>
					<div>
						邮箱: <input type='text' name='email' value='".$email."' />
					</div>
					<div style='margin-left: 100px;'>
						<input type='submit' name='btnSubmit' value='保存' />
					</div>
				</div>
			</form>";
			echo $str;
			
			
			
			// include 'UserProfile.php';
		?>
		<?php
			include 'Footer.html';
		?>
	</body>
</html>
