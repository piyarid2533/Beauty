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

<div class="container">
  <div class="page-header">
    <h3 class="center"><span class="cl-green">แสดงข้อมูลรายการจอง</span></h3>
  </div>
  </br>
  <div class="show">
<?php
include('../config.php');
$member_id	=	$_GET['say_mem'];
$book_id	=	$_GET['say_book'];
if($member_id  != NULL  and  $book_id  !=  NULL)
   {

?>
    <table width="1000" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <th height="40" colspan="2" align="left" bgcolor="#F5F5F5">รหัสสมาชิก</th>
        <th align="left" bgcolor="#F5F5F5">ชื่อ - นามสกุล</th>
        <th width="250" align="left" bgcolor="#F5F5F5">เพศ</th>
        <th width="200" align="left" bgcolor="#F5F5F5">เบอร์โทรศัพท์</th>
      </tr>
      <?php
       $sql_show	=	"select  * from  members  where  member_user  =  '".$member_id."' ";
	   $result_show	=	mysql_query($sql_show) or die (mysql_error());
	   while($show  =  mysql_fetch_assoc($result_show))
	   			{
	  ?>
      <tr>
        <td height="60" colspan="2" align="left"><?=$show['member_user'];?></td>
        <td height="60" align="left"><?=$show['member_name'];?></td>
        <td height="60" align="left"><?=$show['member_sex'];?></td>
        <td height="60" align="left"><?=$show['member_tel'];?></td>
      </tr>
	 <?php
				}
      ?>
      
      
      <tr>
        <th width="60" height="40" align="left" bgcolor="#F5F5F5">#</th>
        <th width="100" align="left" bgcolor="#F5F5F5">รูป</th>
        <th width="390" align="left" bgcolor="#F5F5F5">ชื่อสินค้า</th>
        <th colspan="2" align="left" bgcolor="#F5F5F5">หมวดสินค้า</th>
      </tr>
      <?php
		$sql_show	=	"select  det. *  ,  pro.pro_id  ,  pro.pro_name , pro.pro_img ,  pro.group_id ,  gup. *  from  detail_books  as  det  inner  join  products  as  pro  on  det.pro_id  =  pro.pro_id inner  join  groups as  gup  on  pro.group_id  =  gup.group_id  where  det.book_id  =  '".$book_id."'  ";
		$result_show	=	mysql_query($sql_show) or die (mysql_error());
		$line =  0;
		while($show  =  mysql_fetch_assoc($result_show))
				{
					$line++;
		?>
      <tr>
        <td width="60" height="80" align="left"><?=$line;?></td>
        <td width="100" height="80" align="left"><img src="../img_product/<?=$show['pro_img'];?>"  alt="" width="60" height="60"/></td>
        <td width="390" align="left"><?=$show['pro_name'];?></td>
        <td height="80" colspan="2" align="left"><?=$show['group_name'];?></td>
      </tr>
      <?php
				}
		?>
    </table>
<?php
   }
?>    
  </div>
  
</div>

<?php
include('footer.php');
?>
</body>
</html>