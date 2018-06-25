<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
	<title>修改密码</title>
  <meta name ="viewport" content="width = device-width,initial-scale=1">
  <!-- bootstrap -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">  
  <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <!-- 自定义样式 -->
  <link href="css/style.css" rel="stylesheet" type="text/css" />
  <script src="js/java.js"></script>
</head>
<body class="body">
<?php  
if (isset($_POST["account"])||isset($_COOKIE["flag"])) 
{
     if (isset($_COOKIE["flag"])) 
     {
     	if (isset($_POST["password1"])) 
         {
          	 $account=$_COOKIE["flag"];
          	 $password=$_POST["password1"];
          	 $password=md5($password);
          	 $link = mysqli_connect("localhost","root","","member");
			 if ($link->connect_error) 
			 {
			     die("连接失败: " . $link->connect_error);
			 } 
			 mysqli_query($link,"SET NAMES utf-8");
			 $sql="UPDATE user SET password='$password' Where account='$account';";
			 $result=mysqli_query($link,$sql);
			 if ($result) 
			 {
			 	echo ("<script type='text/javascript'>");
		    	echo ("alert('修改密码成功');");
		    	setcookie("account",$account);
		    	echo ("window.location.href='index.php'");
		    	echo ("</script>");
			 }
			 else
			 {
				echo ("<script type='text/javascript'>");
				echo ("alert('修改失败！');");
				echo ("history.back();");
				echo ("</script>");
			 }	
         }
         else
         {
			print <<<EOT
		      <div class="f-big">
			  <p class="f-p">您现在可以修改密码了</p>
			  <div class="f-second">
			    <form role="form" name="fixform" action="fixpassword.php" method="post">
			      <div class="form-group" >
			          <span class="f-span">重置密码</span><input name="password1" class="form-control input-lg f-input" type="password" placeholder="请输入密码">
			          <span class="f-span">确认输入</span><input name="password2" class="form-control input-lg f-input" type="password" placeholder="请再次输入密码"><br>
			        </div>
			        <div style="margin-top:20px;"><input type="button" value="修改" class="f-button" onclick="fixcheck()"></div>
			    </form>
			  </div>
			</div>
EOT;
          }
     }
     else
     {
 		$link = mysqli_connect("localhost","root","","member");
		if ($link->connect_error) 
		{
		    die("连接失败: " . $link->connect_error);
		} 
		mysqli_query($link,"SET NAMES utf-8");
		$account=$_POST["account"];
		$phone=$_POST["phone"];
		$major=$_POST["major"];
		$qq=$_POST["qq"];
		if ($phone!=""&&$account!=""&&$major!=""&&$qq!="") 
		{
			$account=mysqli_real_escape_string($link,$account);
			$phone=mysqli_real_escape_string($link,$phone);
			$major=mysqli_real_escape_string($link,$major);
			$qq=mysqli_real_escape_string($link,$qq);
			$sql="SELECT account,phone,major,qq FROM user Where account='$account' AND phone='$phone' AND major='$major' AND qq='$qq'";
			$result=mysqli_query($link,$sql);
			if(mysqli_num_rows($result)==0)
			{
				mysqli_free_result($result);
				mysqli_close($link);
				echo ("<script type='text/javascript'>");
			            	echo ("alert('验证不通过，无法进行改密操作！');");
			            	echo ("history.back();");
			            	echo ("</script>");
			}
			else
			{
				setcookie("flag",$account);
				echo "<p style='font-size:35px;color:white;'>验证通过<br>
	                  五秒钟后跳转到<a href='fixpassword.php'>改密码页面</a>
	                  </p>";
	            echo "<meta http-equiv='refresh' content='5; url=fixpassword.php'>";
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
}
else
{
	print <<<EOT
	<p><p>
	<div class="f-big">
	  <p class="f-p">请您填好以下验证信息</p>
	  <div class="f-second">
	    <form role="form" name="fform" action="fixpassword.php" method="post">
	      <div class="form-group" >
	          <span class="f-span">学号</span><input name="account" class="form-control input-lg f-input" type="text" placeholder="请输入您的学号"><br>
	          <span class="f-span">电话</span><input name="phone" class="form-control input-lg f-input" type="text" placeholder="请输入您的电话"><br>
	          <span class="f-span">专业</span><input name="major" class="form-control input-lg f-input" type="text" placeholder="请输入您的专业"><br>
	          <span class="f-span">Q&nbsp;&nbsp;Q</span><input name="qq" class="form-control input-lg f-input" type="text" placeholder="请输入您的QQ"><br>
	        </div>
	        <div style="margin-top:20px;"><input type="button" value="验证" class="f-button" onclick="fcheck()"></div>
	    </form>
	  </div>
	</div>
EOT;
}



?>
</body>
</html>



