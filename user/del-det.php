<?php
session_start();
if($_SESSION['se_status']  !=  'user')
  {
	  echo  "<script>alert('ขออภัยคุณไม่มีสิทธิ์เข้าใช้งาน');window.location='../index.php';</script>";  
  }


$say_id  =  $_GET['say_id'];
$det_id	=	$_GET['det_id'];

if($say_id  !=  NULL)
   {
	   include('../config.php');
		$sql_del	=	"delete from detail_books  where  det_id  =  '".$det_id."' ";
		$result_del  	=	mysql_query($sql_del);
		if($result_del  == true)
			{
				echo "<script>window.location='detail-det.php?link=uri_det&say_id=".$say_id."';</script>";
			}
		mysql_close($config);
   }
?>