<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>用户注册</title>
  <meta name ="viewport" content="width = device-width,initial-scale=1">
  <!-- bootstrap -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"> 
  <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script> 
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <!-- 自定义样式 -->
  <link href="css/style.css" rel="stylesheet" type="text/css">
  <script src="js/java.js"></script>
</head>
<body class="add-body">
<?php  
if (isset($_POST["account"]))
{
    $link = mysqli_connect("localhost","root","","member");
    if ($link->connect_error) 
    {
        die("连接失败: " . $link->connect_error);
    } 
    mysqli_query($link,"SET NAMES utf-8");
    $account=$_POST["account"];
    $password1=$_POST["password1"];
    $password2=$_POST["password2"];
    $phone=$_POST["phone"];
    $college=$_POST["college"];
    $sex=$_POST["sex"];
    $major=$_POST["major"];
    $qq=$_POST["qq"];
    $f='0';
    if ($account!=""&&$password1!=""&&$password2==$password1) 
    {
      $account=mysqli_real_escape_string($link,$account);
      $password=md5($password1);
      $sql="SELECT*FROM user Where account='$account'";
      $result=mysqli_query($link,$sql);
      if(mysqli_num_rows($result)!=0)
      {
        mysqli_free_result($result);
        mysqli_close($link);
        echo ("<script type='text/javascript'>");
            echo ("alert('注册失败，该用户已经存在');");
            echo ("history.back();");
            echo ("</script>");
      }
      else
      {
        $stmt = mysqli_prepare($link, "INSERT INTO user (account,password,phone,major,qq,sex,college,state) VALUES (?,?,?,?,?,?,?,?);");
        mysqli_stmt_bind_param($stmt, 'isssssss',$account, $password,$phone,$major,$qq,$sex,$college,$f);
        // $insertsql="INSERT INTO user VALUES (".$account.",".$password.",".$phone.",".$major.",".$qq.",".$sex.",".$college.",".$f.");";
        if ($account==0) 
        {
          echo "<script>alert('注册失败。account==0');history.back();</script>";
        }
        else
        {
          $result=mysqli_stmt_execute($stmt);
          // $insertresult=mysqli_query($link,$insertsql);
          if (!$result)
          {
            echo ("<script type='text/javascript'>");
                  echo ("alert('注册失败，预处理错误');");
                  echo ("history.back();");
                  echo ("</script>");
          }
          else
          {
                  if (isset($_POST["flag"])) 
                  {
                       echo "<script>alert('添加成功');window.location.href='admin-adduser.php'</script>";
                  }
                  else
                  {
                      setcookie("account",$account);
                      echo "<p style='font-size:35px;color:white;'>注册成功<br>
                            五秒钟后跳转到<a href='index.php'>登陆页面</a>
                            </p>";
                      echo "<meta http-equiv='refresh' content='5; url=index.php'>";
                   }
          }
        }
      }
    }
    else
    {
      echo ("<script type='text/javascript'>");
        echo ("alert('注册失败');");
        echo ("history.back();");
        echo ("</script>");
    }
}
else
{
print <<<EOT
<p class="add-h">欢迎注册</p>
<div class="add-big">
  <p class="add-p">请您填好以下信息，即可注册。</p>
  <div class="add-second">
    <form role="form" name="addform" action="join.php" method="post">
      <div class="form-group" >
          <span class="add-span">学号</span><input name="account" class="form-control input-lg add-input" type="text" placeholder="请输入您的学号">
          <span class="add-span">密码</span><input name="password1" class="form-control input-lg add-input" type="password" placeholder="请输入您的密码"><br>
          <span class="add-span">确认</span><input name="password2" class="form-control input-lg add-input" type="password" placeholder="请再次输入您的密码">
          <span class="add-span">电话</span><input name="phone" class="form-control input-lg add-input" type="text" placeholder="请输入您的电话"><br>
          <span class="add-span">专业</span><input name="major" class="form-control input-lg add-input" type="text" placeholder="请输入您的专业">
          <span class="add-span">Q&nbsp;&nbsp;Q</span><input name="qq" class="form-control input-lg add-input" type="text" placeholder="请输入您的QQ"><br>
          <span class="add-span">学院</span>
          <select class="form-control add-select" name="college">
            <option value="信息">信息学院</option>
            <option value="化工">化工学院</option>
            <option value="机电">机电学院</option>
            <option value="材料">材料学院</option>
          </select>
          <span class="add-span">性别</span>
          <select class="form-control add-select" name="sex">
            <option value="男">帅哥</option>
            <option value="女">美女</option>
          </select>
        </div>
        <div style="width:100%;text-align:right"><input type="button" value="提交" class="add-button" onclick="add()"></div>
    </form>
  </div>
</div>
EOT;
}
?>

</body>
</html>