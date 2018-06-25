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
        <div style="margin-top: 3px;color: white;"><span>欢迎您：</span><?php echo $_COOKIE["administer"]; ?>&nbsp;<a href="esc.php">注销</a><a href="administer.php">返回首页</a><a href="admin-adduser.php">添加用户</a>
        </div>
    </div>
  </div>
  <div class="sort">留言管理</div>
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
     $sql="SELECT id,account,content,time FROM message ORDER BY time DESC";
     $result=mysqli_query($link,$sql);
     $total_records=mysqli_num_rows($result);
     if ($total_records==0) 
     {
         echo "没有信息";
     }
     else
     {
               echo "
           <div class='contentbox-3'>
              <table class='table'>
              <thead>
                  <tr>
                    <th>用户</th>
                    <th>留言</th>
                  </tr>
              </thead>
              <tbody>";
         while ($row=mysqli_fetch_assoc($result)) 
         {
           $id=$row["id"];
           echo " <tr>
                    <td width='20%'>".$row['account']."</td>
                    <td width='40%'>
                      ".$row["content"]."
                    </td>
                    <form action='chuli.php' style='display:inline-block;' method='post'>
                      <td><input type='hidden' name='del' value='$id'><input type='submit' value='删除'></td>
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