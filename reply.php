<!-- //<!DOCTYPE html> -->
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
$id=$_POST["reply"];
$page=$_POST['page'];
$account=$_COOKIE["account"];
$content=$_POST["content"];
$content=mysqli_real_escape_string($link,$content);
$sql="INSERT INTO reply(flag,content,account) VALUES (".$id.",'".$content."','".$account."');";
//$sql="INSERT INTO `member`.`reply` (`flag`, `content`, `account`) VALUES ('$id', '$content', '$account');";
$result=mysqli_query($link,$sql);
var_dump($sql);
var_dump($result);
if (!$result) 
{
   echo "<script>alert('失败');</script>";
}
else
{
  echo "<script>alert('回复成功');window.location.href='content.php?page=".$page."';</script>";
}
?>
</body>
</html>