<?php
session_start();
if($_SESSION['se_status']  !=  'admin')
  {
	  echo  "<script>alert('ขออภัยคุณไม่มีสิทธิ์เข้าใช้งาน');window.location='../index.php';</script>";  
  }


$pro_id  =  $_GET['say_id'];
$group	=	$_GET['say_group'];
$pro_img	=	$_GET['say_img'];

if($pro_id  !=  NULL)
   {
	   include('../config.php');
		$sql_del	=	"delete from products  where  pro_id  =  '".$pro_id."' ";
		$result_del  	=	mysql_query($sql_del);
		if($result_del  == true)
			{
				@unlink('../img_product/'.$pro_img);
				echo "<script>window.location='show-product.php?link=uri_product&say=1&say_group=".$group."';</script>";
			}
		mysql_close($config);
   }
?>