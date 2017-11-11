<?php
session_start();
if($_SESSION['se_status']  !=  'admin')
  {
	  echo  "<script>alert('ขออภัยคุณไม่มีสิทธิ์เข้าใช้งาน');window.location='../index.php';</script>";  
  }


$spe_id  =  $_GET['say_id'];

if($spe_id  !=  NULL)
   {
	   include('../config.php');
		$sql_del	=	"delete from specials  where  spe_id  =  '".$spe_id."' ";
		$result_del  	=	mysql_query($sql_del);
		if($result_del  == true)
			{
				echo "<script>window.location='detail-spe.php?link=uri_pro&say_name=".$_GET['say_name']."';</script>";
			}
		mysql_close($config);
   }
?>