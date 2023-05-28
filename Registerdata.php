<?php
	require_once 'Conn.php';		//链接数据库
//------------------------读取用户信息(开始)------------------------//
	$userName=$_POST['userName'];
	$password=$_POST['pwd'];
	$rpassword=$_POST['confirmPwd'];
	$cName=$_POST['cName'];
	$country=$_POST['country'];
	$province=$_POST['province'];
	$city=$_POST['city'];
	$address=$_POST['address'];
	$zip=$_POST['zip'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
//------------------------读取用户信息(结束)------------------------//

//------------------------js判断与输出(开始)------------------------//
	if(empty($userName)){
		echo "<script>alert('用户名没有填写!');history.go(-1);</script>";
		exit();
	}
	if(empty($password)){
		echo "<script>alert('密码没有填写!');history.go(-1);</script>";
		exit();
	}
	if($rpassword!=$password){
		echo "<script>alert('两次输入的密码不一样!');history.go(-1);</script>";
		exit();
	}
//------------------------js判断与输出(结束)------------------------//

//------------------------注册信息的判断(开始)------------------------//
	$sql="select = FROM account WHERE UserName = '$userName'";	//判断注册的用户名是否存在
	$result=mysqli_query($db,$sql);
	$rowcount=mysqli_num_rows($result);
	
	if($rowcount>0){
		echo "<script>alert('用户已存在! ');history.go(-1);</script>";
		exit();
	}
	$sql="insert into account VALUES('$userName','$password','$cName','$country','$province','$city','$address','$zip','$phone','$email')";
	
	$result=mysqli_query($db,$sql);
	
	if($result){
		echo "<script>alert('注册成功! ');</script>";
		header("location:Index.php");
	}else{
		echo "<script>alert('注册失败! ');</script>";
		header("location:Index.php");
	}
//------------------------注册信息的判断(结束)------------------------//
?>