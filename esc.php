<?php 
if (isset($_COOKIE["administer"])) 
 {
 	setcookie("administer","");
 	echo "<script>window.location.href='index.php'</script>";
 }
 else
 {
   setcookie("account","");
   setcookie("flag","");
   echo "<script>window.location.href='index.php'</script>";
 }
?>