<?php
session_start();
if($_SESSION['se_status']  !=  'admin')
  {
	  echo  "<script>alert('ขออภัยคุณไม่มีสิทธิ์เข้าใช้งาน');window.location='../index.php';</script>";  
  }


$new_id  =  $_GET['say_id'];
$year	=	$_GET['say_year'];

if($new_id  !=  NULL)
   {
	   include('../config.php');
		$sql_del	=	"delete from news  where  new_id  =  '".$new_id."' ";
		$result_del  	=	mysql_query($sql_del);
		if($result_del  == true)
			{
				echo "<script>window.location='show-new.php?link=uri_new&say=1&say_year=".$year."';</script>";
			}
		mysql_close($config);
   }
?>