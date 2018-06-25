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
$account=$_COOKIE["account"];
$sql="SELECT account FROM administer Where account='$account'";
$result=mysqli_query($link,$sql);
if (mysqli_num_rows($result)==0) 
{
	setcookie("agree","true");
    echo "<script>window.location.href='sq_administer.php';</script>";
}
else
{
	echo "<script>alert('您已经是管理员了');history.back();</script>";
}
?>
</body>
</html>