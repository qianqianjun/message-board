<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>申请管理员</title>
</head>
<body>
<?php  
if (isset($_COOKIE["agree"])) 
{
	$link = mysqli_connect("localhost","root","","member");
    if ($link->connect_error) 
    {
        die("连接失败: " . $link->connect_error);
    } 
    mysqli_query($link,"SET NAMES utf-8");
	$account=$_COOKIE["account"];
	$sql="INSERT INTO administer SELECT * FROM user Where account='$account'";
	$result=mysqli_query($link,$sql);
	if($result)
	{
		setcookie("administer","$account");
		echo $account;
		echo "<script>alert('申请管理员成功');window.location.href='administer.php'</script>";
	}
	else
		echo "<script>alert('申请管理员失败');history.back();</script>";
}
else
   echo "你不要搞事情!";
?>
</body>
</html>