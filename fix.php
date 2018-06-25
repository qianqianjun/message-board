<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>修改内容</title>
  <script type="text/javascript">
      function check()
      {
         if (document.myForm.content.value.length==0) 
         {
          alert("您还没有输入内容！");
         }
         else
          myForm.submit();
      }
  </script>
</head>
<body>
<?php 
    if (isset($_POST["content"])) 
    {
    	$id=$_POST["id"];
    	$content=$_POST["content"];
	    $link = mysqli_connect("localhost","root","","member");
		if ($link->connect_error) 
		{
		    die("连接失败: " . $link->connect_error);
		} 
		mysqli_query($link,"SET NAMES utf-8");
	    $sql = "UPDATE message SET content = '$content'  Where id = $id";
	    mysqli_query($link,$sql);
	    header("location:guanli.php");
    }
    else
    {
	    $link = mysqli_connect("localhost","root","","member");
		if ($link->connect_error) 
		{
		    die("连接失败: " . $link->connect_error);
		} 
		mysqli_query($link,"SET NAMES utf-8");
		$id=$_POST["id"];
	    $sql="SELECT*FROM message Where id='$id'";
	    $result=mysqli_query($link,$sql);
	    $row=mysqli_fetch_assoc($result);
	    $content=$row["content"];
	    print<<<EOT
	  <div style="width:500px;height:320px;margin:0 auto;margin-top:100px; background:url(images/fix.jpg);">
	     <div style="display: inline-block;text-align: center;margin-top: 60px;width: 500px;"></div>
	     <div style="text-align: center;margin-left: 50px;width: 400px;">
	        <form name="myForm" method="post" action="fix.php">
	           <div style='margin-top:50px;'>
	               <textarea name='content' cols='20' rows='4' style='width:300px;height: 100px;font-size: 20px;'>
EOT;
	               echo $content."</textarea>
	           </div>
	           <div> 
	                  <input type='hidden' name='id' value='$id'>
	                  <input type='button' value='确认修改' onclick='check()'>&nbsp;&nbsp;
	                  <input type='reset' value='撤销重来'></div>
	        </form>
	     </div>
	  </div>";
    }
?>
</body>
</html>