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
		
		<h1>用户注册</h1>
		<form action="Registerdata.php" method="post">
			<div id="reg">
				<div>
					用户名: <input type="text" name="userName" />
				</div>
				<div>
					密码: <input type="password" name="pwd" />
				</div>
				<div>
					确认密码: <input type="password" name="confirmPwd" />
				</div>
				<div>
					姓名: <input type="text" name="cName" />
				</div>
				<div>
					国家: <input type="text" name="country" />
				</div>
				<div>
					省份: <input type="text" name="province" />
				</div>
				<div>
					城市: <input type="text" name="city" />
				</div>
				<div>
					地址: <input type="text" name="address" />
				</div>
				<div>
					邮编: <input type="text" name="zip" />
				</div>
				<div>
					手机: <input type="text" name="phone" />
				</div>
				<div>
					邮箱: <input type="text" name="email" />
				</div>
				<div style="margin-left: 100px;">
					<input type="submit" name="btnSubmit" value="注册" />
				</div>
			</div>
		</form>
		
		<?php
			include 'Footer.html';
		?>
	</body>
</html>
