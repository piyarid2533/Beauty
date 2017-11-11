<?php
session_start();
if($_SESSION['se_status']  !=  'admin')
  {
	  echo  "<script>alert('ขออภัยคุณไม่มีสิทธิ์เข้าใช้งาน');window.location='../index.php';</script>";  
  }


$psn_id  =  $_GET['say_id'];

if($psn_id  !=  NULL)
   {
	   include('../config.php');
		$sql_del	=	"delete from personnels  where  psn_id  =  '".$psn_id."' ";
		$result_del  	=	mysql_query($sql_del);
		if($result_del  == true)
			{
				echo "<script>window.location='show-psn.php?link=uri_psn';</script>";
			}
		mysql_close($config);
   }
?>