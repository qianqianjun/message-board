<?php  
    $id=$_POST['id'];
    $link = mysqli_connect("localhost","root","","member");
    if ($link->connect_error) 
    {
        die("连接失败: " . $link->connect_error);
    } 
    mysqli_query($link,"SET NAMES utf-8");
    echo $id;
    $sql="DELETE FROM `member`.`message` WHERE `message`.`id` = $id";
    mysqli_query($link,$sql);
    mysqli_close($link);
    header("location:guanli.php");
    exit();
?>
