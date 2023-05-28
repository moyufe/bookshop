<?php
	require_once 'Conn.php';		//链接数据库
	$sql="select * FROM account WHERE Username = '".$_COOKIE['userName']."'";
	$result=mysqli_query($db,$sql);		//获取用户的信息
	$sz=mysqli_fetch_assoc($result);	//以关联数组返回结果集
	
	$userName=$sz['Username'];			//获取数组的值
	$password=$sz['Password'];
	$rpassword=$_POST['confirmPwd'];
	$cName=$_POST['cName'];
	$country=$_POST['country'];
	$province=$_POST['province'];
	$city=$_POST['city'];
	$address=$_POST['address'];
	$zip=$_POST['zip'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	
	$sql1="DELETE FROM `account` WHERE `Username`='".$userName."'";
	$result=mysqli_query($db,$sql1);
	$sql2="insert into account VALUES('$userName','$password','$cName','$country','$province','$city','$address','$zip','$phone','$email')";
	$result=mysqli_query($db,$sql2);
	
	header("location:UserProfile.php");
?>