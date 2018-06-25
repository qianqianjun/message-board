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
    .admin-td{
      width:50%;
    }
    @media screen and (max-width: 620px){
    .admin-td{
      width:25%;
    }
    @media screen and (max-width: 400px){
    .admin-td{
      width:10%;
    }
  </style>
  <script src="js/java.js"></script>
  <script type="text/javascript">
      function adminpost()
      {
        if (document.adminform.account.value.length==0)
          alert("请输入您的账号!");
        else if (document.adminform.password1.value.length==0)
          alert("请输入您的密码!");
        else if (document.adminform.password2.value.length==0)
          alert("请再次输入您的密码");
        else if (document.adminform.password2.value!=document.adminform.password1.value)
          alert("两次输入的密码不一致!");
        else if (document.adminform.phone.value.length==0)
          alert("请输入您的电话");
        else if (document.adminform.major.value.length==0)
          alert("请输入您的专业!");
        else if (document.adminform.qq.value.length==0)
          alert("请再次输入您的qq号");
        else 
          adminform.submit();
      }
  </script>
</head>
<body class="con-body">
<div class="con-big">
  <div class="title"><img src="images/buct.jpg" class="buct"><img src="images/biao.jpg" class="biao"></div>
  <div class="second-title">
    <div class="dao">
        <div style="color: white;font-weight: bold;font-size:2em;">管理员平台</div>
        <div style="margin-top: 3px;color: white;"><span>欢迎您：</span><?php echo $_COOKIE["administer"]; ?>&nbsp;<a href="esc.php">注销</a><a href="admin-guanli.php">留言管理</a><a href="administer.php">返回首页</a>
        </div>
    </div>
  </div>
  <div class="sort">添加用户</div>
  <div class="content" id="text">
<?php  
  if(isset($_COOKIE["administer"]))
  {
               echo "
           <div class='contentbox-3'>
              <table class='table'>
              <tbody>";
           echo " 
                <form action='join.php' style='display:inline-block;' method='post' name='adminform'>
                  <tr>
                    <td class=''><input name='account' class='form-control input-lg' type='text' placeholder='请输入账号'></td>
                    <td class='admin-td'></td>  
                  </tr>
                  <tr>
                    <td class=''><input name='password1' class='form-control input-lg' type='password' placeholder='请输入密码'></td>
                    <td class='admin-td'></td>  
                  </tr>
                  <tr>
                    <td class=''><input name='password2' class='form-control input-lg' type='password' placeholder='请输入确认密码'></td>
                    <td class='admin-td'></td>  
                  </tr>
                  <tr>
                    <td class=''><input name='phone' class='form-control input-lg' type='text' placeholder='请输入电话'></td>
                    <td class='admin-td'></td>  
                  </tr>
                  <tr>
                    <td class=''><input name='qq' class='form-control input-lg' type='text' placeholder='请输入QQ'></td>
                    <td class='admin-td'></td>  
                  </tr>
                  <tr>
                    <td class=''><input name='major' class='form-control input-lg' type='text' placeholder='请输入专业'></td>
                    <td class='admin-td'></td>  
                  </tr>
                  <tr>
                    <td class=''>
                       <select class='form-control add-select' name='college'>
                        <option value='信息'>信息学院</option>
                        <option value='化工'>化工学院</option>
                        <option value='机电'>机电学院</option>
                        <option value='材料'>材料学院</option>
                      </select>
                    </td>
                    <td class='admin-td'></td>  
                  </tr>
                  <tr>
                    <td class=''>
                        <select class='form-control add-select' name='sex'>
                          <option value='男'>女</option>
                          <option value='女'>男</option>
                        </select>
                    </td>
                    <td class='admin-td'></td>  
                  </tr>
                  <tr>
                    <td class=''><input type='button' value='提交' onclick='adminpost()'></td>  
                  </tr>
                  <tr>
                    <td class=''><input type='hidden' value='1' name='flag'></td>  
                  </tr>
                </form>
                ";    
         echo "</tbody>
               </table> 
           </div>";
  
  }
  else
    echo "您还没有登陆!";
?> 
  </div>
</div>
<div class="con-bottom">技术支持<br>学生网络中心技术部开发组高谦<br>联系我们2016014302@mail.buct.edu.cn</div>
</body>
</html>
