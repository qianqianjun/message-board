<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title></title>
</head>
<body bgcolor="pink">
<?php  
   $link=mysqli_connect('localhost','root','','student');
   if($link->connect_error)
   {
   	   die("连接失败: " . $link->connect_error);
   }
   mysqli_query($link,"SET NAMES utf-8");
   $texts=$_POST["text"];
   $stmt = mysqli_prepare($link, "UPDATE user SET texts=? Where id=26;");
   mysqli_stmt_bind_param($stmt, 's',$texts);
   $result=mysqli_stmt_execute($stmt);
   if (!$result) 
   {
   	echo ("<script type='text/javascript'>");
		echo ("alert('提交失败');");
		echo ("history.back();");
		echo ("</script>");
   }
   else
   {
   	    echo "<script>window.location.href='show.php'</script>";
   }
?>
</body>
</html>
