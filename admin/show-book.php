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
       	<h3 class="center"><span class="cl-green">แสดงข้อมูลลูกค้าที่จองบริการ</span></h3>
   	</div>
  	</br>
	<div class="show">
   	  <table width="1000" border="0" cellspacing="0" cellpadding="0">
    	  <tr>
    	    <th width="30" height="40" align="left">#</th>
    	    <th width="150" align="left">รหัสสมาชิก</th>
    	    <th width="300" align="left">ชื่อ - นามสกุล</th>
    	    <th width="100" align="left">เวลาจอง</th>
    	    <th width="120" align="left">รายการ</th>
    	    <th width="100" align="left">ยอดเงิน</th>
    	    <th width="100" align="left">ทำรายการ</th>
    	    <th width="100" align="left">รายการจอง</th>
   	    </tr>
        <?php

		$sql_show	=	"select  count(dt.pro_id) as num_qty ,  sum(dt.det_price) as total_price , bk.book_id as new_id ,  bk.*  , mem.* , dt. *  from  books as bk inner join members as mem  on  bk.member_user = mem.member_user  left join detail_books as dt  on bk.book_id  =  dt.book_id where  bk.book_date  = '".$find_date."' group by dt.book_id   order by  bk.book_time asc ";
		$result_show	=	mysql_query($sql_show);
		$line	=	0;
		while($show  =  mysql_fetch_assoc($result_show))
				{
					$line++;
		?>
    	  <tr >
    	    <td width="30" height="35" align="left" style="font-size:11px;"><?=$line;?></td>
    	    <td width="150" align="left" style="font-size:11px;"><?=$show['member_user'];?></td>
    	    <td width="300" align="left" style="font-size:11px;"><?=$show['member_name'];?></td>
    	    <td width="100" align="left" style="font-size:11px;"><?=$show['book_time'];?>
&nbsp;น.</td>
    	    <td width="120" align="left" style="font-size:11px;"><?=$show['num_qty'];?></td>
    	    <td width="100" align="left" style="font-size:11px;"><?=$show['total_price'];?></td>
    	    <td width="100" align="left" style="font-size:11px;">
			<?php
            if($show['book_status']  ==  1)
			   {
				   echo  "<span class='cl-green'>Succeed</span>";
			   }
			else
			   {
				   echo  "<span class='cl-red'>No</span>";
			   }
			?>
            </td>
    	    <td width="100" align="left" style="font-size:11px;">
            <?php
            if($show['book_status']  ==  1)
			   {
			?>
       		  <img src="../img/Ok.png" width="24" height="24"  alt=""/>
<?
			   }
			else
			   {
			?>
            		<a href="show-detail-list2.php?say_date=<?=$find_date;?>&say_id=<?=$show['new_id'];?>&say_book=<?=$show['book_id'];?>&say_mem=<?=$show['member_user'];?>"><img src="../img/Currency Dollar.png"  alt="" width="24" height="24"/></a>
            <?
			   }
			?>
            
            
            </td>
   	    </tr>
        <?php
					}
		?>
    	  <tr >
    	    <td height="80" colspan="2" align="left" ><img src="../img/Ok.png" width="24" height="24"  alt=""/> = คิดเงินแล้ว</td>
    	    <td height="80" colspan="6" align="left" ><img src="../img/Currency Dollar.png" width="24" height="24"  alt=""/> =  ยังไม่ได้คิดเงิน</td>
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