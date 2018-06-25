<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
	<title>登陆</title>
  <meta name ="viewport" content="width = device-width,initial-scale=1">
  <!-- bootstrap -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">  
  <!-- <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script> -->
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <!-- 自定义样式 -->
  <link href="css/style.css" rel="stylesheet" type="text/css" />
  <script src="js/java.js"></script>
</head>
<body>
<?php  
if (isset($_COOKIE["account"])) 
{
	echo "<script>window.location.href='content.php'</script>";
}
else
{
	print <<<ETO
<body class="body">
<div class="big">
  <div class="h">北京化工大学表白墙</div>
  <div class="second">
    <form role="form" name="myform" action="index.php" method="post">
      <div class="form-group" >
          <span class="span">学号</span><input name="account" class="form-control input-lg input" type="text" placeholder="请输入您的学号">
          <span class="span">密码</span><input name="password" class="form-control input-lg input" type="password" placeholder="请输入您的密码"><br>
		  <div class='id'>
		  <input type="radio" name="identity" value="administer" class="input-radio"><span class="span1">管理员</span>
		  <input type="radio" name="identity"  value="user" class="input-radio"><span class="span1">用户</span>
		  <div class='abq'>
		  <a href="join.php" style="text-decoration:none;color:white;"><cite title="点击注册">没有账号</cite>&nbsp;</a>    
	      <a href="fixpassword.php" style="text-decoration:none;color:white;"><cite title="点击进行密码的找回">忘记密码</cite></a>
	      </div>
          </div>
      </div>
      <div style="width:100%;text-align:right"><input type="button" value="登录" class="button" onclick="check()"></div>
    </form>
  </div>
</div>
ETO;
}
if (isset($_POST["account"])) 
{
	$link = mysqli_connect("localhost","root","","member");
	if ($link->connect_error) 
	{
	    die("连接失败: " . $link->connect_error);
	} 
	mysqli_query($link,"SET NAMES utf-8");
	$account=$_POST["account"];
	$password=$_POST["password"];
	if ($password!=""&&$account!="") 
	{
		if ($_POST["identity"]=="administer") 
		{
			$account=mysqli_real_escape_string($link,$account);
			$password=md5($password);
			$sql="SELECT account,password FROM administer Where account='$account' AND password='$password'";
			$result=mysqli_query($link,$sql);
			if(mysqli_num_rows($result)==0)
			{
				mysqli_free_result($result);
				mysqli_close($link);
				echo ("<script type='text/javascript'>");
			            	echo ("alert('账号或密码错误，请重新填写！');");
			            	echo ("history.back();");
			            	echo ("</script>");
			}
			else
			{
				setcookie("administer",$account);
				echo "<script>alert('登陆成功!');window.location.href='administer.php'</script>";
			}
		}
		if ($_POST["identity"]=="user")
		{
			$account=mysqli_real_escape_string($link,$account);
			$password=md5($password);
			$sql="SELECT account,password,state FROM user Where account='$account' AND password='$password' AND state!='1'";
			$result=mysqli_query($link,$sql);
			if(mysqli_num_rows($result)==0)
			{
				mysqli_free_result($result);
				mysqli_close($link);
				echo ("<script type='text/javascript'>");
			            	echo ("alert('账号或密码错误，请重新填写！');");
			            	echo ("history.back();");
			            	echo ("</script>");
			}
			else
			{
				setcookie("account",$account);
				echo "<script>alert('登陆成功!');window.location.href='content.php'</script>";
			}
		}
	}
	else
	{
		echo ("<script type='text/javascript'>");
		echo ("alert('请完整填写登陆信息！');");
		echo ("history.back();");
		echo ("</script>");
	}
}

?>
</body>
</html>