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
<title>รายงาน</title>

<style type="text/css">
body,td,th {
	font-family: "Gill Sans", "Gill Sans MT", "Myriad Pro", "DejaVu Sans Condensed", Helvetica, Arial, sans-serif;
	font-size: 12px;
	color: #6D6D6D;
	border-left: none;
	border-top: none;
}
</style>
</head>

<body onLoad="window.print() ;"> 
<?php
include('../config.php');
$member_id	=	$_GET['say_mem'];
$book_id	=	$_GET['say_book'];
if($member_id  != NULL  and  $book_id  !=  NULL)
   {
       $sql_up   =  "update  books  set  book_status  =  1   where  book_id  =  '".$book_id."' ";
	   mysql_query($sql_up);
	  

       $sql_show	=	"select  * from  members  where  member_user  =  '".$member_id."' ";
	   $result_show	=	mysql_query($sql_show) or die (mysql_error());
	   while($show  =  mysql_fetch_assoc($result_show))
	   			{
?>
<table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="120" height="60"></td>
    <td width="125" height="60"></td>
    <td height="60" colspan="2" align="left"><h3>ใบเสร็จชำระเงิน ร้านบิวตี๊ซาลอน</h3></td>
    <td width="100" height="60"></td>
    <td width="100" height="60"></td>
  </tr>
  <tr>
    <td width="120" height="30" align="left" valign="top">ออกให้รหัสสมาชิก</td>
    <td width="125" height="30" align="left" valign="top"><?=$show['member_user'];?></td>
    <td width="80" height="30" align="left" valign="top">ชื่อ - นามสกุล</td>
    <td width="225" height="30" align="left" valign="top"><?=$show['member_name'];?></td>
    <td width="100" height="30" align="left" valign="top">วันที่ออกใบเสร็จ</td>
    <td width="100" height="30" align="left" valign="top"><?=date('d / m / Y');?></td>
  </tr>
</table>
	 <?php
				}
      ?>
<table width="800" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <th width="60" height="30" align="center">รายการ</th>
    <th width="200" height="30" align="left"  style="padding-left:7px;">หมวด</th>
    <th width="340" height="30" align="left" style="padding-left:7px;">ชื่อสินค้า</th>
    <th width="100" height="30" align="center">จำนวนรายการ</th>
    <th width="100" height="30" align="center">ราคา</th>
  </tr>
  		<?php
		$sql_show	=	"select  count(det.pro_id) as num_pro ,  det. *  ,  pro.pro_id  ,  pro.pro_name , pro.pro_img ,  pro.group_id ,  gup. *  from  detail_books  as  det  inner  join  products  as  pro  on  det.pro_id  =  pro.pro_id inner  join  groups as  gup  on  pro.group_id  =  gup.group_id  where  det.book_id  =  '".$book_id."'  group by  det.pro_id order by  pro.pro_sell  asc  ";
		$result_show	=	mysql_query($sql_show) or die (mysql_error());
		$line =  0;
		while($show  =  mysql_fetch_assoc($result_show))
				{
					$line++;
					
					$sql_cut  =  "update  products  set   pro_qty  =  pro_qty  -  '".$show['num_pro']."'  where  pro_id  =  '".$show['pro_id']."'   ";
					mysql_query($sql_cut);
		?>
  <tr>
    <td width="60" height="30" align="center"><?=$line;?></td>
    <td width="200" height="30" style="padding-left:7px;"><?=$show['group_name'];?></td>
    <td width="340" height="30" style="padding-left:7px;"><?=$show['pro_name'];?></td>
    <td width="100" height="30" align="center" ><?=$show['num_pro'];?></td>
    <td width="100" height="30" align="right" style="padding-right:5px;"><?=$money[$line]  =  $show['det_price'];?></td>
  </tr>
  <?php
				}
  ?>
  <tr>
    <td height="30" colspan="3" align="center"></td>
    <td width="100" height="30" align="center"><strong>รวมราคา</strong></td>
    <td width="100" height="30" align="right" style="padding-right:5px;"><?=number_format(array_sum($money), 2);?></td>
  </tr>
</table>
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="500" height="50" align="center" valign="middle">&nbsp;</td>
    <td width="100" height="50" align="center" valign="middle">ผู้ออกใบเสร็จ</td>
    <td width="200" height="50" valign="middle"><?=$_SESSION['se_name'];?></td>
  </tr>
</table>
<?php
   }
mysql_close($config);
?>
</body>
</html>