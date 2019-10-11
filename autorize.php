<?php
@session_start();
ob_start();
$login=$_POST['login'];
$parol=$_POST['parol'];
if (isset($login) && isset($parol))
{
$url=$_SERVER['HTTP_REFERER'];
include_once('classes/connect_mysqli.php');
$result=$mysqli->query("select * from users where login='".$login."' and parol='".$parol."'");
$row=$result->fetch_array();;
$id=$row['id'];
$status=$row['status_u'];
$fio=$row['fio'];
$_SESSION['id']=$id;
$_SESSION['status']=$status;
$_SESSION['fio']=$fio;
$_SESSION['status_u']=$row['status'];
if($_SESSION['status_u']=='a')
{ header("Location:list_employees.php");
exit;
}
elseif($_SESSION['status_u']=='u')
{ header("Location:massage.php");
exit;

}
else
{ header("Location:error.php");
exit;
}
mysql_close();
}
else echo exit("?????!");
?>