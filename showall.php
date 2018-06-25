<?php  
  if(isset($_COOKIE["account"]))
  {
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
           // $x=$row["id"];
           // $account=$row["account"];
      
           // $mingling="<td width='80' height='80' align='center' style='background:url(images/delete.jpg)'>
           //                div style='padding-top:50px;'>
           //                     <input type='button' value='删除' onclick='myfunction()'>
           //                  </div>
           //                 </td>";
           // echo $row["author"];
           // echo "时间：".$row["date"]."<hr>";
           // echo "告白：".$row["content"]."</td>";
           // echo  $mingling;
           $x=$j%2;
           echo "
           <div class='contentbox-".$x."'>
             <div class='con-p'><span class='con-span'>表白者:".$row['account']."</span></div>
             <div class='con-p'><span class='con-span'>时间:".$row['time']."</span></div>
             <span class='con-span'>真情告白:</span><br>
             <div class='con-div'>".$row['content']."</div>
           </div>";
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
         $page_banner.="<form method='get' action='content.php'name='myForm'>";
         $page_banner.="到第<input type='text' name='page' size='2'>页";
         $page_banner.="<input type='button' value='确定' onclick='checkpage()'>";
         $page_banner.="</form></div>";
         echo $page_banner;
    }
  }
  else
    echo "您还没有登陆!";
?>