<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>管理员页面</title>
  <meta name ="viewport" content="width = device-width,initial-scale=1">
  <!-- bootstrap -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">  
  <script src="http:cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <!-- 自定义样式 -->
  <link href="css/style.css" rel="stylesheet" type="text/css" />
  <style type="text/css">
  </style>
  <script src="js/java.js"></script>
  <script type="text/javascript">
  </script>
</head>
<body class="con-body">
<div class="con-big">
  <div class="title"><img src="images/buct.jpg" class="buct"><img src="images/biao.jpg" class="biao"></div>
  <div class="second-title">
    <div class="dao">
        <div style="color: white;font-weight: bold;font-size:2em;">管理员平台</div>
        <div style="margin-top: 3px;color: white;"><span>欢迎您：</span><?php echo $_COOKIE["administer"]; ?>&nbsp;<a href="esc.php">注销</a><a href="admin-guanli.php">留言管理</a><a href="admin-adduser.php">添加用户</a>
        </div>
    </div>
  </div>
  <div class="sort">用户管理</div>
  <div class="content" id="text">
<?php  
  if(isset($_COOKIE["administer"]))
  {
     $link = mysqli_connect("localhost","root","","member");
     if ($link->connect_error) 
     {
         die("连接失败: " . $link->connect_error);
     } 
     mysqli_query($link,"SET NAMES utf-8");
     $sql="SELECT id,account,state FROM user";
     $result=mysqli_query($link,$sql);
     $total_records=mysqli_num_rows($result);
     if ($total_records==0) 
     {
         echo "没有用户";
     }
     else
     {
               echo "
           <div class='contentbox-3'>
              <table class='table'>
              <thead>
                  <tr>
                    <th>用户</th>
                    <th>操作</th>
                  </tr>
              </thead>
              <tbody>";
         while ($row=mysqli_fetch_assoc($result)) 
         {
           $id=$row["id"];
           echo "
                  <tr>
                    <td width='20%'>".$row['account']."</td>";
                    if ($row['state']==1) 
                    {
                      echo "<form action='chuli.php' style='display:inline-block;' method='post'>
                    <td width='15%'><input type='hidden' name='huifu' value='$id'><input type='submit' value='允许登陆'></td>
                    </form>";
                    }
                    else
                    {
                      echo "<form action='chuli.php' style='display:inline-block;' method='post'>
                    <td width='15%'><input type='hidden' name='jindeng' value='$id'><input type='submit' value='禁止登陆'></td>
                    </form>";
                    }
                    
               echo"<form action='chuli.php' style='display:inline-block;' method='post'>
                    <td><input type='hidden' name='gaimi' value='$id'><input type='submit' value='修改密码'></td>
                    </form>
                  </tr>
                ";    
         }
         echo "</tbody>
               </table> 
           </div>";
  
     }
  }
  else
    echo "您还没有登陆!";
?> 
  </div>
</div>
<div class="con-bottom">技术支持<br>学生网络中心技术部开发组高谦<br>联系我们2016014302@mail.buct.edu.cn</div>
</body>
</html>