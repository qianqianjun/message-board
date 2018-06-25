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
 $content=$_POST["content"];
 $current_time=date("Y-m-d H:i:s");
 $content=mysqli_real_escape_string($link,$content);
 $stmt = mysqli_prepare($link, "INSERT INTO message (account,content,time) VALUES (?,?,?);");
        mysqli_stmt_bind_param($stmt, 'iss',$account, $content,$current_time);
 if ($account==0) 
{
  echo "<script>alert('失败');history.back();</script>";
}
else
{
  $result=mysqli_stmt_execute($stmt);
  if (!$result) 
  {
    echo ("<script type='text/javascript'>");
          echo ("alert('失败');");
          echo ("history.back();");
          echo ("</script>");
  }
  else
  {
    echo "<script>alert('表白成功');window.location.href='guanli.php';</script>";
  }
}
 ?>
 </body>
</html>