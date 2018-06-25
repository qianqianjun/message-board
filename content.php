<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
	<title>用户页面</title>
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
        <a href="guanli.php"><input type="button" class="daobutton" value="管理留言"></a>
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
     $link = mysqli_connect("localhost","root","","member");
     if ($link->connect_error) 
     {
         die("连接失败: " . $link->connect_error);
     } 
     mysqli_query($link,"SET NAMES utf-8");
     $records_per_page=5;
     if (isset($_GET["page"])) 
     {
       $page=$_GET["page"];
     }
     else
       $page=1;
     $pages=($page-1)*$records_per_page;
     $pagess=$page-1;
     $pagesss=$page+1;
     $sql="SELECT*FROM message ORDER BY time DESC";
     $result=mysqli_query($link,$sql);
     $total_records=mysqli_num_rows($result);
     if ($total_records==0) 
     {
         echo "该网站新建的没有留言，点击表白按钮，赶快抢占沙发吧！";
     }
     else
     {
         $total_pages=ceil($total_records/$records_per_page);
         mysqli_data_seek($result,$pages);
         $j=1;
         while ($row=mysqli_fetch_assoc($result) and $j<=$records_per_page) 
         {
           $id=$row["id"];
           $sql="SELECT*FROM reply where flag='$id'";
           $res=mysqli_query($link,$sql);
           $k=$j%2;
           echo "
           <div class='contentbox-".$k."'>
             <div class='con-p'><span class='con-span'>表白者:".$row['account']."</span></div>
             <div class='con-p'><span class='con-span'>时间:".$row['time']."</span></div>
             <span class='con-span'>真情告白:</span><br>
             <div class='con-div'>".htmlspecialchars($row['content'])."</div>";
            while ($rows=mysqli_fetch_assoc($res)) 
            {
              echo "<div class='con-p'><span class='con-span'>回复人:".$rows['account']."</span></div>";
              echo "<span class='con-span'>回复内容:</span><br>";
              echo "<div class='con-div'>".htmlspecialchars($rows['content'])."</div>";
            }
           echo "<div style='margin-top:10px;margin-left:10px;'>
                  <div style='display:inline-block;'>
                    <form action='chuli.php' method='post'>
                       <input type='hidden' value='$id' name='reply'>
                       <input type='hidden' value='$page' name='page'>
                       <input type='submit' value='回复'>
                    </form>
                  </div>
                 </div>";
           echo"</div>";
           $j++;
         }
         //分页条;
         $showpage=5;
         $page_banner="<div class='page'>";
         $pageoffset=($showpage-1)/2;
         $start=1;
         $end=$total_pages;
         if ($page>1) 
         {
              $page_banner.="<a href='content.php?page=1'>首页</a>";
              $page_banner.="<a href='content.php?page=$pagess'>上一页</a>";
         }
         else
         {
              $page_banner.="<span class='disable'>首页</span>";
              $page_banner.="<span class='disable'>上一页</span>";
         }
         if ($total_pages>$showpage) 
         {
             if ($page>$pageoffset+1) 
             {
               $page_banner.="…";
             }
             if ($page>$pageoffset) 
             {
                $start=$page-$pageoffset;
                $end=$total_pages>$pageoffset+$page?$page+$pageoffset:$total_pages;
             }
             else
             {
                $start=1;
                $end=$total_pages>$showpage?$showpage:$total_pages;
             }
             if ($page+$pageoffset>$total_pages) 
             {
                $start=$start-($page+$pageoffset-$end);
             }
         }


         
         for ($i=$start; $i <=$end ; $i++) 
         {    
            if ($page==$i) 
            {
              $page_banner.="<span class='current'>{$i}</span>";
            }
            else
            {
              $page_banner.="<a href='content.php?page=$i'>{$i}</a>";
            }
         }
             



         if ($total_pages>$showpage&&$total_pages>$page+$pageoffset) 
         {
             $page_banner.="…";
         }
         if ($page<$total_pages) 
         {
              $page_banner.="<a href='content.php?page=$pagesss'>下一页</a>";
              $page_banner.="<a href='content.php?page=$total_pages'>尾页</a>";
         }
         else
         {
              $page_banner.="<span class='disable'>下一页</span>";
              $page_banner.="<span class='disable'>尾页</span>";
         }
         
         $page_banner.="共{$total_pages}页&nbsp;";
         $page_banner.="<form method='get' action='content.php'name='pageform'>";
         $page_banner.="到第<input type='text' name='page' size='2'>页";
         $page_banner.="<input type='button' value='确定' onclick='checkpage()'>";
         $page_banner.="</form></div>";
         echo $page_banner;
          echo "<script type='text/javascript'>
       function checkpage()
       {";
   echo "if (document.pageform.page.value>$total_pages||document.pageform.page.value<1) 
            {
              alert('页数超过范围');
            }
          else
          {
              pageform.submit();
          }
       }
      </script>";
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