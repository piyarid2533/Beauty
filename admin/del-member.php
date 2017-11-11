<?php
session_start();
if($_SESSION['se_status']  !=  'admin')
  {
	  echo  "<script>alert('ขออภัยคุณไม่มีสิทธิ์เข้าใช้งาน');window.location='../index.php';</script>";  
  }


$member_user  =  $_GET['say_user'];

if($member_user  !=  NULL)
   {
	   include('../config.php');
		$sql_del	=	"delete from members  where  member_user  =  '".$member_user."' ";
		$result_del  	=	mysql_query($sql_del);
		if($result_del  == true)
			{
				echo "<script>window.location='show-member.php?link=uri_user';</script>";
			}
		mysql_close($config);
   }
?>