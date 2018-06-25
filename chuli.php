<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
	<title></title>
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
$link = mysqli_connect("localhost","root","","member");
if ($link->connect_error) 
{
  die("连接失败: " . $link->connect_error);
} 
mysqli_query($link,"SET NAMES utf-8");
if (isset($_POST["jindeng"])) 
{
  $id=$_POST["jindeng"];
  $sql="UPDATE user SET state='1' Where id='$id'";
  mysqli_query($link,$sql);
  echo "<script>alert('该用户已经被限制登陆了!');window.location.href='administer.php';</script>";
}
if (isset($_POST["huifu"])) 
{
  $id=$_POST["huifu"];
  $sql="UPDATE user SET state='0' Where id='$id'";
  mysqli_query($link,$sql);
  echo "<script>alert('您已经允许该用户登陆了!');window.location.href='administer.php';</script>";
}
if (isset($_POST["gaimi"])) 
{
	$id=$_POST["gaimi"];
	print <<<EOT
		      <div class="f-big">
			  <p class="f-p">您现在可以修改密码了</p>
			  <div class="f-second">
			    <form role="form" name="adminfixform" action="gaimi.php" method="post">
			      <div class="form-group" >
			          <span class="f-span">重置密码</span><input name="password1" class="form-control input-lg f-input" type="password" placeholder="请输入密码">
			          <span class="f-span">确认输入</span><input name="password2" class="form-control input-lg f-input" type="password" placeholder="请再次输入密码"><br>
			          <input type='hidden' value='$id' name="text">
			        </div>
			        <div style="margin-top:20px;"><input type="button" value="修改" class="f-button" onclick="adminfixpass()"></div>
			    </form>
			  </div>
			</div>
EOT;
}
if (isset($_POST["del"])) 
{
    $id=$_POST["del"];
    $sql="DELETE FROM `member`.`message` WHERE `message`.`id` = $id";
    mysqli_query($link,$sql);
    echo "<script>alert('删除成功!');window.location.href='admin-guanli.php';</script>";
}
if (isset($_POST['reply'])) 
{
 $id=$_POST["reply"];
 $page=$_POST["page"];
 print<<<EOT
    <div class='contentbox-1' style='margin-left:10%;'>
        <form name='biaobai' action='reply.php' method='post'>
           <div class="express">键入你的回复内容</div>
             <div style="margin-left:10px;">
             <div style=''>
                <textarea name='content' class="textarea"></textarea>
            </div>
            <input type='hidden' value='$id' name='reply'>
            <input type='hidden' value='$page' name='page'>
            <div style=''>
               <input type='button' onclick='post()' value='回复'>
               <input type='reset' value='重置'>
            </div>
          </div>
        </form>
    </div>
EOT;
}
?>
</body>
</html>