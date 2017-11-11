<?php
session_start();
if($_SESSION['se_status']  !=  'admin')
  {
	  echo  "<script>alert('ขออภัยคุณไม่มีสิทธิ์เข้าใช้งาน');window.location='../index.php';</script>";  
  }

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>

<meta http-equiv="refresh" content="600;URL=send-auto-sms.php?link=uri_sms">
<link rel="stylesheet" type="text/css" href="../design.css">
</head>

<body>
<?php
include('bar-top.php');
?>

<div class="container">
	<div class="page-header">
    	<h1><span  class="cl-orange">เปิดระบบส่ง  Sms  แล้ว</span></h1>
    </div>
</div>

<?php
include('../config.php');

$date_now	=	date('Y-m-d');


$sql_check	=	"select bk. *  ,  mem. * from  books as bk inner  join  members as mem  on  bk.member_user  =  mem.member_user  where  bk.book_date  =  '".$date_now."'  and   bk.book_sms = 0  order by  bk.book_time  asc  limit 0,1  ";
$result_check 	=	mysql_query($sql_check);
$rows_check   =  mysql_num_rows($result_check);
if($result_check  ==  true)
  {	  
	  while($show  =  mysql_fetch_assoc($result_check))
	          {
				  $y_time  =  $show['book_time'];
				  $mem_user  =  $show['member_user'];
				  $mem_name  =  $show['member_name'];
				  $phone	=	$show['member_tel'];
			  }  
	  
	  $curr_time = strtotime($y_time);
	  $last_time =  date("H.i", mktime(date("H",$curr_time)+0, date("i",$curr_time)-30));
	  $time  =  date('H.i');

	  if($time  >=   $last_time  and  $time  <=  $y_time)
		  {
			  
			  
			  $sql_sms	=	"select  *  from  set_sms";
			  $result_sms  =  mysql_query($sql_sms);
			  while($show_sms  =  mysql_fetch_assoc($result_sms))
					  {
							$set_user   =  $show_sms['set_user'];  
							$set_pass  =  $show_sms['set_pass'];  
							$set_credit  =  $show_sms['set_credit'];  
							$set_name  =  $show_sms['set_name'];  
							$set_msg  =  $show_sms['set_msg'];  
					  }
					  
			  $send_now   =  date('ymdHi' , strtotime($date_now.$last_time));
			  
			  include("sms.class.php");
			  
			  $username = $set_user;
			  $password = $set_pass;
			  $msisdn = $phone;
			  $message = $set_msg.$y_time;
			  $sender = $set_name;
			  $ScheduledDelivery = $send_now;
			  $force = $set_credit;
			
			  $result = sms::send_sms($username,$password,$msisdn,$message,$sender,$ScheduledDelivery,$force);
			  
			  $sql_up	=	"update  books  set  book_sms  =  1   where  member_user = '".$mem_user."'  ";
			  mysql_query($sql_up);
			  
			  echo  "
			  <div class='container'>
				  <div class='page-header'>
						<h1><span   class='cl-green'>ส่ง sms  เรียบร้อยแล้ว</span></h1> 
						<br>
						<h5>ส่งให้กลับ  สมาชิก  username  =  ".$mem_user."</h5>
						<br>
						<h5>ชื่อ - นามสกุล  =  ".$mem_name."</h5>
						<br>
						<h5>เบอร์โทรศัพท์  =  ".$phone."</h5>
						<br>
				  </div>
			   </div>
			   ";

		  }
  }


mysql_close($config);
?>
</body>
</html>