<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title></title>
</head>
<body>
<?php  
$link = mysqli_connect("localhost","root","","member");
if ($link->connect_error) 
{
 die("连接失败: " . $link->connect_error);
} 
mysqli_query($link,"SET NAMES utf-8");
$id=$_POST["text"];
$password=$_POST["password1"];
echo "$id";
$password=md5($password);
$sql="UPDATE user SET password='$password' Where id='$id'";
$result=mysqli_query($link,$sql);
$sql="UPDATE administer SET password='$password' Where id='$id'";
$result1=mysqli_query($link,$sql);
if ($result||$result1) 
{
	echo "<script>alert('修改成功');window.location.href='administer.php';</script>";
}
else
{
	echo "<script>alert('修改失败');history.back();</script>";
}
?>
</body>
</html>
