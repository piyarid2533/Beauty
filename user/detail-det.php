<?php
session_start();
if($_SESSION['se_status']  !=  'user')
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
$book_id	=	$_GET['say_id'];
if($book_id  !=  NULL)
  {
			  
		  
?>
	<div class="page-header">
       	<h3 class="center"><span class="cl-green">แสดงข้อมูลรายการจอง</span></h3>
   	</div>
  	</br>
	<div class="show">
   	  <table width="1000" border="0" cellspacing="0" cellpadding="0">
    	  <tr>
    	    <th width="60" height="40" align="left" bgcolor="#F5F5F5">#</th>
    	    <th width="100" align="left" bgcolor="#F5F5F5">รูป</th>
    	    <th width="330" align="left" bgcolor="#F5F5F5">ชื่อสินค้า</th>
    	    <th width="250" align="left" bgcolor="#F5F5F5">หมวดสินค้า</th>
    	    <th width="200" align="left" bgcolor="#F5F5F5">ราคา</th>
    	    <th width="60" height="40" align="left" bgcolor="#F5F5F5">ลบ</th>
   	    </tr>
        <?php
        include('../config.php');
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
    	    <td width="330" align="left"><?=$show['pro_name'];?></td>
    	    <td width="250" height="80" align="left"><?=$show['group_name'];?></td>
    	    <td width="200" height="80" align="left"><?=$show['det_price'];?></td>
    	    <td width="60" height="80" align="left"><a href="del-det.php?say_id=<?=$book_id?>&det_id=<?=$show['det_id'];?>" onClick="return confirm('คุณต้องการลบข้อมูลนี้');"><img src="../img/Trash.png" width="24" height="24"  alt=""/></a></td>
   	    </tr>
        <?php
				}
		?>
  	  </table>
  </div>
<?php
  }
?></div>

<?php
include('footer.php');
?>
</body>
</html>