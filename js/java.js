// 首页js 
function check()
{
if(document.myform.account.value.length==0)
    alert("亲，账号不能为空白啊！");
  else if (document.myform.password.value.length==0)
    alert("亲，请输入密码！");
  else if (document.myform.identity.value.length==0)
        alert("亲，请选择登录身份！");
    else
    myform.submit();
}
//注册js
function add()
{
	if (document.addform.account.value.length==0)
		alert("请输入您的账号!");
	else if (document.addform.password1.value.length==0)
		alert("请输入您的密码!");
	else if (document.addform.password2.value.length==0)
		alert("请再次输入您的密码");
	else if (document.addform.password2.value!=document.addform.password1.value)
		alert("两次输入的密码不一致!");
	else if (document.addform.phone.value.length==0)
		alert("请输入您的电话");
	else if (document.addform.major.value.length==0)
		alert("请输入您的专业!");
	else if (document.addform.qq.value.length==0)
		alert("请再次输入您的qq号");
	else 
		addform.submit();
}


//忘记密码js
function fcheck()
{
	if (document.fform.account.value.length==0)
		alert("请输入您的账号!");
	else if (document.fform.phone.value.length==0)
		alert("请输入您的电话");
	else if (document.fform.major.value.length==0)
		alert("请输入您的专业!");
	else if (document.fform.qq.value.length==0)
		alert("请输入您的qq号");
	else 
		fform.submit();
}
function fixcheck()
{
	if (document.fixform.password1.value.length==0)
		alert("请输入您的密码!");
	else if (document.fixform.password2.value.length==0)
		alert("请再次输入您的密码！");
	else
		fixform.submit();
}

// function ajaxLoad(myUl,myId)
//     {
//          var xmlhttp;
//          if (window.XMLHttpRequest)
//         {
//              // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
//              xmlhttp=new XMLHttpRequest();
//          }
//           else
//         {
//              // IE6, IE5 浏览器执行代码
//              xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
//          }
//           xmlhttp.onreadystatechange=function()
//          {
//               if (xmlhttp.readyState==4 && xmlhttp.status==200)
//              {
//                    document.getElementById(myId).innerHTML=xmlhttp.responseText;
//               }
//          }
//           xmlhttp.open('GET',myUl,true);
//           xmlhttp.send();
//     }

//表白功能提交;
function post()
{
  if (document.biaobai.content.value.length==0) 
  {
     alert("您还没有输入任何内容!");
  }
  else
      biaobai.submit();
}

//娱乐功能;
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

//
function adminfixpass()
{
  if (document.adminfixform.password1.value.length==0)
    alert("请输入您的密码!");
  else if (document.adminfixform.password2.value.length==0)
    alert("请再次输入您的密码！");
  else
    adminfixform.submit();
}


