<?php
include 'connection.php';
$tbemail=$_REQUEST['tbemail'];
$tbpassword=$_REQUEST['tbpassword'];

$s="select * from user_signup where email='$tbemail'";
$result=mysqli_query($conn,$s);
if(mysqli_num_rows($result)>0)
{
    $row=mysqli_fetch_array($result);
    if($row['password']==$tbpassword )
    {
        session_start();
        $_SESSION['user']=$tbemail;
        header("Location:index.php");
    }
    else
    {
        header("Location:userlogin.php?er=2");
    }
}
else
{
    header("Location:userlogin.php?er=1");
}