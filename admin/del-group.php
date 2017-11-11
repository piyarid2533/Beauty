<?php
session_start();
if($_SESSION['se_status']  !=  'admin')
  {
	  echo  "<script>alert('ขออภัยคุณไม่มีสิทธิ์เข้าใช้งาน');window.location='../index.php';</script>";  
  }


$group_id  =  $_GET['say_id'];

if($group_id  !=  NULL)
   {
	   include('../config.php');
		$sql_del	=	"delete from groups  where  group_id  =  '".$group_id."' ";
		$result_del  	=	mysql_query($sql_del);
		if($result_del  == true)
			{
				echo "<script>window.location='show-group.php?link=uri_group';</script>";
			}
		mysql_close($config);
   }
?>