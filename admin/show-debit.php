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
<link rel="stylesheet" type="text/css" href="../design.css">
</head>

<body>
<?php
include('bar-top.php');
?>

<div class="container">
  <form action="<?=$_SERVER['PHP_SELF']; ?>" method="post" name="frm_search" id="frm_search">
   		<table width="500" border="0" cellspacing="0" cellpadding="0">
      		  <tr>
      		    <td width="200" height="40" align="center" bgcolor="#43BF94"><h3 ><span class="cl-write"> menu search</span></h3></td>
      		    <td width="10" height="40">&nbsp;</td>
      		    <td height="40"><input name="find_date" type="date" id="find_date" max="2020-12-31" min="2014-01-01" class="txt-field"></td>
      		    <td width="90" height="40" align="center"><input type="submit" name="btn_search" id="btn_search" value="search" class="btn"></td>
	      </tr>
	    </table>
  </form>
  <?php
    if(($_SERVER['REQUEST_METHOD']  == 'POST' and $_REQUEST['btn_search'])  or  $_GET['say']  == 1)
		{
			include('../config.php');
			if($_GET['say'] == 1)
			  {
					$find_date	=	$_GET['say_date'];
			  }
			else
			  {
				  	$find_date	=	$_POST['find_date'];
			  }

  ?>
	<div class="page-header">
       	<h3 class="center"><span class="cl-green">แสดงข้อมูลรายรับประจำวันที่     &nbsp;&nbsp;  <?=date('d  /  m  /  Y' , strtotime($find_date))?></span></h3>
   	</div>
  	</br>
	<div class="show">
   	  <table width="1000" border="0" cellspacing="0" cellpadding="0">
    	  <tr>
    	    <th width="50" height="40" align="left">#</th>
    	    <th width="150" align="left">รหัสสมาชิก</th>
    	    <th width="400" align="left">ชื่อ - นามสกุล</th>
    	    <th width="130" align="left">เวลาจอง</th>
    	    <th width="130" align="left">จำนวนรายการ</th>
    	    <th width="130" align="right" style="padding-right: 7px;">ยอดเงิน</th>
   	    </tr>
        <?php

		$sql_show	=	"select  count(dt.pro_id) as num_qty ,  sum(dt.det_price) as total_price , bk.book_id as new_id ,  bk.*  , mem.* , dt. *  from  books as bk inner join members as mem  on  bk.member_user = mem.member_user  left join detail_books as dt  on bk.book_id  =  dt.book_id where  bk.book_date  = '".$find_date."'  and  bk.book_status = 1 group by dt.book_id   order by  bk.book_time asc ";
		$result_show	=	mysql_query($sql_show);
		$line	=	0;
		while($show  =  mysql_fetch_assoc($result_show))
				{
					$line++;
		?>
    	  <tr >
    	    <td width="50" height="35" align="left" style="font-size:11px;"><?=$line;?></td>
    	    <td width="150" align="left" style="font-size:11px;"><?=$show['member_user'];?></td>
    	    <td width="400" align="left" style="font-size:11px;"><?=$show['member_name'];?></td>
    	    <td width="130" align="left" style="font-size:11px;"><?=$show['book_time'];?>
&nbsp;น.</td>
    	    <td width="130" align="center" style="font-size:11px; "><?=$show['num_qty'];?></td>
    	    <td width="130" align="right" style="font-size:11px; padding-right: 7px;"><?=$price[$line]  =   $show['total_price'];?></td>
   	    </tr>
        <?php
					}
		?>
    	  <tr >
    	    <td height="35" colspan="4" align="left" style="font-size:11px;">&nbsp;</td>
    	    <td align="left" bgcolor="#F5F5F5" style="font-size:11px;">ยอดรวม</td>
    	    <td align="right" style="font-size:11px; padding-right: 7px;">
			<?
			if($price  !=  NULL)
			   {
					echo  number_format(array_sum($price) , 2);
			   }
			?></td>
  	    </tr>
        
        
  	  </table>
  </div>
  <?php
		}
  ?>
</div>

<?php
include('footer.php');
?>



</body>
</html>