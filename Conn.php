<?php
	$db=new mysqli("localhost","root","root","bookshop");
	if($db->connect_errno){
		exit("数据库连接失败。");
	}
?>