<header>
	<img src='Images/banner.jpg' >
</header>
<nav>
	<ul>
		<li><a href='Index.php'>主页</a></li>
		<li><a href='Register.php'>用户注册</a></li>
		<li><a href='UserProfile.php'>用户信息</a></li>
		<li><a href='ShoppingCart.php'>购物车</a></li>
		<?php
			session_start();
			if(isset($_SESSION['userName'])){
				echo "<li><a href='Logout.php'>注销</a></li>";
				echo "<li style='width: 250px;float:right;'>".$_SESSION['userName'].",欢迎访问网上书城系统!<li>";
			}
			else{
				echo"<li><a href='Login.php'>用户登录</a></li>";
				echo "<li style='width: 250px;float:right;'>欢迎访问网上书城系统!<li>";
			}
		?>
	</ul>
</nav>