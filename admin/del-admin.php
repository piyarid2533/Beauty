<?php
session_start();
if($_SESSION['se_status']  !=  'admin')
  {
	  echo  "<script>alert('ขออภัยคุณไม่มีสิทธิ์เข้าใช้งาน');window.location='../index.php';</script>";  
  }


$admin_user  =  $_GET['say_user'];

if($admin_user  !=  NULL)
   {
	   include('../config.php');
		$sql_del	=	"delete from admins  where  admin_user  =  '".$admin_user."' ";
		$result_del  	=	mysql_query($sql_del);
		if($result_del  == true)
			{
				echo "<script>window.location='show-admin.php?link=uri_admin';</script>";
			}
		mysql_close($config);
   }
?>