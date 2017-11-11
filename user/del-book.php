<?php
session_start();
if($_SESSION['se_status']  !=  'user')
  {
	  echo  "<script>alert('ขออภัยคุณไม่มีสิทธิ์เข้าใช้งาน');window.location='../index.php';</script>";  
  }


$say_id  =  $_GET['say_id'];

if($say_id  !=  NULL)
   {
	   include('../config.php');
		$sql_del	=	"delete from books  where  book_id  =  '".$say_id."' ";
		$result_del  	=	mysql_query($sql_del);
		if($result_del  == true)
			{
				$sql_del2	=	"delete  from  detail_books  where  book_id  =  '".$say_id."' ";
				mysql_query($sql_del2);
				
				echo "<script>window.location='show-book.php?link=uri_book';</script>";
			}
		mysql_close($config);
   }
?>