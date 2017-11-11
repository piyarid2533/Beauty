<?php
session_start();

if($_SESSION['se_status']  !=  'admin')
  {
	  echo  "<script>alert('ขออภัยคุณไม่มีสิทธิ์เข้าใช้งาน');window.location='../index.php';</script>";  
  }

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="../design.css">
</head>

<body>
<?php
include('../config.php');
$member_id	=	$_GET['say_mem'];

if($member_id  != NULL)
   {
	   $sql_show	=	"select  * from  members  where  member_user  =  '".$member_id."' ";
	   $result_show	=	mysql_query($sql_show) or die (mysql_error());
	   while($show  =  mysql_fetch_assoc($result_show))
	   			{
?>
<table width="350" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="25" align="right"></td>
    <td height="25"></td>
    <td height="25" align="left"></td>
  </tr>
  <tr>
    <td width="100" height="30" align="right">รหัสสมาชิก</td>
    <td width="10" height="30"></td>
    <td width="240" height="30" align="left"><?=$show['member_user'];?></td>
  </tr>
  <tr>
    <td width="100" height="30" align="right">ชื่อ - นามสกุล</td>
    <td width="10" height="30"></td>
    <td width="240" height="30" align="left"><?=$show['member_name'];?></td>
  </tr>
  <tr>
    <td width="100" height="30" align="right">เพศ</td>
    <td width="10" height="30"></td>
    <td width="240" height="30" align="left"><?=$show['member_sex'];?></td>
  </tr>
  <tr>
    <td width="100" height="30" align="right">เบอร์โทรศัพท์</td>
    <td width="10" height="30"></td>
    <td width="240" height="30" align="left"><?=$show['member_tel'];?></td>
  </tr>
  <tr>
    <td width="100" height="10" align="right"></td>
    <td width="10" height="10"></td>
    <td width="240" height="10" align="left"></td>
  </tr>
</table>
<?php
				}
   }
?>
</body>
</html>