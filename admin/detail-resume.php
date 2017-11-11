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

<?php
$find_date	=	$_GET['say_date'];
$member_user  = $_GET['say_user'];
if($find_date  != NULL)
  {


?>
  <div class="page-header">
       	<h3 class="center"><span class="cl-green">แสดงข้อมูลใช้บริการ</span></h3>
   	</div>
  	</br>
	<div class="show">
   	  <table width="1000" border="0" cellpadding="0" cellspacing="0">
    	  <tr>
    	    <th width="50" height="40" align="left">#</th>
    	    <th width="130" align="left">วัน / เดือน / ปี</th>
    	    <th width="130" align="left">เวลาใช้บริการ</th>
    	    <th width="150" align="left">จำนวนรายการที่ทำ</th>
    	    <th width="130" height="40" align="left">รวมยอดเงิน</th>
   	    </tr>
        
<?php
		include('../config.php');
		$sql_show	=	"select  count(dt.pro_id) as num_qty ,  sum(dt.det_price) as total_price , bk.book_id as new_id ,  bk.* , dt. *  from  books as bk  left join detail_books as dt  on bk.book_id  =  dt.book_id where  bk.book_date  like '".$find_date."%'  and  bk.member_user = '".$member_user."' group by dt.book_id   order by  bk.book_date , bk.book_time asc ";
		$result_show	=	mysql_query($sql_show);
		$line	=	0;
		while($show  =  mysql_fetch_assoc($result_show))
				{
					$line++;
?>
    	  <tr>
    	    <td width="50" height="35" align="left"><?=$line;?></td>
    	    <td width="130" align="left"><?=date('d  /  m  /  Y'  ,  strtotime($show['book_date']))?></td>
    	    <td width="130" align="left"><span style="font-size:11px;">
    	      <?=$show['book_time'];?>
&nbsp;น.</span></td>
    	    <td align="left" style="font-size:11px;"><?=$show['num_qty'];?></td>
    	    <td align="left" style="font-size:11px;"><?=$show['total_price'];?></td>
   	    </tr>
        <?php
				}
		?>
    	  <tr>
    	    <td height="100" colspan="5" align="center"><input type="button" name="button" id="button" value=" ย้อนหลัง " class="btn"  onClick="window.location='show-resume.php?say=1&say_date=<?=$_GET['say_date'];?>&say_user=<?=$_GET['say_user']?>'"></td>
   	    </tr>
        
  	  </table>
  </div>
  <?php
  }
  ?>
  
</div>

<?php
include('footer.php');

function convert_month( $input )
  {
 
    $arr_month = array( '' , 'มกราคม' , 'กุมภาพันธ์' , 'มีนาคม' , 'เมษายน' , 'พฤษภาคม' , 'มิถุนายน' , 'กรกฎาคม' ,'สิงหาคม' , 'กันยายน' , 'ตุลาคม' , 'พฤศจิกายน' , 'ธันวาคม' ) ;
    return $arr_month[ $input ] ;
 
 }
?>
</body>
</html>