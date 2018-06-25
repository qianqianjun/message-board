<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>管理留言</title>
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
    function con()
    {
      if(confirm("老师，您确定暑期学校要录取高谦了么？"))
      {
        window.location.href="pre.php";
      }
      else
      {
        alert("抱歉，您无法加入管理员团队！");
      }
    }
  </script>>
</head>
<body class="con-body">
<div class="con-big">
  <div class="title"><img src="images/buct.jpg" class="buct"><img src="images/biao.jpg" class="biao"></div>
  <div class="second-title">
    <div class="dao">
        <a href="content.php"><input type="button" class="daobutton" value="返回内容"></a>
        <a href="esc.php"><input type="button" class="daobutton" value="注销登陆"></a>
        <a href="fixpass.php"><input type="button" class="daobutton" value="修改密码"></a>
        <a><input type="button" class="daobutton" value="申请管理员" onclick="con()"></a>
    </div>
  </div>
  <div class="sort">内容</div>
  <div class="content" id="text">
     <?php  
  if(isset($_COOKIE["account"]))
  {
     $account=$_COOKIE["account"];
     $link = mysqli_connect("localhost","root","","member");
     if ($link->connect_error) 
     {
         die("连接失败: " . $link->connect_error);
     } 
     mysqli_query($link,"SET NAMES utf-8");
     $records_per_page=10;
     if (isset($_GET["page"])) 
     {
       $page=$_GET["page"];
     }
     else
       $page=1;
     $pages=($page-1)*$records_per_page;
     $pagess=$page-1;
     $pagesss=$page+1;
     $sql="SELECT*FROM message Where account='$account' ORDER BY time DESC";
     $result=mysqli_query($link,$sql);
     $total_records=mysqli_num_rows($result);
     if ($total_records==0) 
     {
         echo "您还没有留言，点击表白按钮，赶快抢占沙发吧！";
         print<<<EOT
          <div class='contentbox-1'>
              <form name='biaobai' action='biaobai.php' method='post'>
                 <div class="express">大声说出你的爱吧!</div>
                 <div style=''>
                    <textarea name='content' class="textarea"></textarea>
                </div>
                <div style=''>
                   <input type='button' onclick='post()' value='大胆表白'>
                   <input type='reset' value='酝酿一下'>
                </div>
              </form>
          </div>
EOT;
     }
     else
     {
         $total_pages=ceil($total_records/$records_per_page);
         mysqli_data_seek($result,$pages);
         $j=1;
         while ($row=mysqli_fetch_assoc($result) and $j<=$records_per_page) 
         {
           $x=$j%2;
           $id=$row["id"];
           echo "
           <div class='contentbox-".$x."'>
             <div class='con-p'><span class='con-span'>时间:".$row['time']."</span></div>
             <span class='con-span'>真情告白:</span><br>
             <div class='con-div'>".$row['content']."</div>
             <div style='margin-top:10px;margin-left:10px;'>
                  <div style='display:inline-block;'><form action='delete.php' method='post'>
                    <input type='hidden' value='$id' name='id'>
                    <input type='submit' value='删除'>
                  </form></div>
                  <div style='display:inline-block;'>
                  <form action='fix.php' method='post'>
                     <input type='hidden' value='$id' name='id'>
                     <input type='submit' value='修改'>
                  </form></div>
             </div>
           </div>";
           $j++;
         }
         print<<<EOT
          <div class='contentbox-1'>
              <form name='biaobai' action='biaobai.php' method='post'>
                 <div class="express">大声说出你的爱吧!</div>
                 <div style=''>
                    <textarea name='content' class="textarea"></textarea>
                </div>
                <div style=''>
                   <input type='button' onclick='post()' value='大胆表白'>
                   <input type='reset' value='酝酿一下'>
                </div>
              </form>
          </div>
EOT;
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
