<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Редактировать!</title>
<link href="style/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
ob_start();
@session_start();
if($_SESSION['status_u']<>'a'){
die("<h1 align='center'>Error 404</h1>");
}
?>
<link href="style/style.css" rel="stylesheet" type="text/css" />
<table width="1024" border="0" cellpadding="0" cellspacing="0" align="center">
  <!--DWLayoutTable-->
  <tr>
    <td width="44" height="21" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="6" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr>
    <td height="50" valign="top" bgcolor="#805b92"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="5" valign="middle" bgcolor="#805b92">
     <table class="pag" width="580" cellpadding="0" cellspacing="0">
    <tr align="center">
    <td width="100" height="48" valign="moddle" >
      <a class="p1" href="#"><p>Главное</p></a></td>
    <td width="200" valign="moddle">
      <a class="p1" href="search.php"><p>Поиск заявителя</p></a></td>
    <td width="200" valign="moddle" bgcolor="#dac4e5">
      <a class="p1" href="list_employees.php"><p>Редактировать</p></a></td>
    <td width="80" valign="moddle">
      <a class="p1" href="#"><p>О Нас</p></a></td>
    </tr>
</table>
	</td>
  <td colspan="3" valign="middle" bgcolor="#805b92">
  <?
  include('block/search.php');
  ?>
    </td>
  </tr>
  <tr>
    <td height="210" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="4" valign="top" bgcolor="#FFFFFF">
	<?php
require_once("classes/classes.php");

if(isset($_GET['emp'])){

	$emp=$_GET['emp'];
}


if(empty($emp)){

echo "<h1 style='color:#ff0000;' align='center'>Заявитель не существует!</h1>";

}
else{

$employees=new employees();
$employees->edit_employees($emp);

}


?>  <br>
	</td>
    <td width="15">&nbsp;</td>
    <td colspan="3" valign="top" bgcolor="#dac4e5">
    <? include('block/right_side_site.php'); ?>
    </td>
  </tr>
  
 <tr>
    <td height="19" valign="middle" bgcolor="#805b92"><!--DWLayoutEmptyCell-->&nbsp;</td>
<? include('block/footer.php'); ?>
    <td colspan="2" valign="middle" bgcolor="#805b92"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="3" valign="middle" bgcolor="#805b92" align="center"><a class="font_3" href="#"><font>Разработчик Мансуров Темур &copy;2019</font></td>
  </tr>
  <tr>
    <td height="0"></td>
    <td></td>
    <td></td>
    <td></td>
    <td width="511"></td>
    <td></td>
    <td width="56"></td>
    <td></td>
    <td></td>
  </tr>
</table>
</body>
</html>
