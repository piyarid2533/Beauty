<?php
session_start();
if($_SESSION['se_status']  !=  'admin')
  {
	  echo  "<script>alert('ขออภัยคุณไม่มีสิทธิ์เข้าใช้งาน');window.location='../index.php';</script>";  
  }


$say_id  =  $_GET['say_id'];
$det_id	=	$_GET['det_id'];
$member_id	=	$_GET['say_mem'];
$find_date = $_GET['say_date'];
if($say_id  !=  NULL)
   {
	   include('../config.php');
		$sql_del	=	"delete from detail_books  where  det_id  =  '".$det_id."' ";
		$result_del  	=	mysql_query($sql_del);
		if($result_del  == true)
			{
				echo "<script>window.location='show-detail-list2.php?say_mem=".$member_id."&say_book=".$say_id."&say_date=".$find_date."';</script>";
			}
		mysql_close($config);
   }
?>