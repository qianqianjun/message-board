<?php  
    $account=$_COOKIE["account"];
    setcookie("flag",$account);
    echo "<script>window.location.href='fixpassword.php'</script>";
?>