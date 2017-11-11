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
	<div class="page-header">
       	<h3 class="center"><span class="cl-green">แสดงข้อมูลจองรายการ</span></h3>
   	</div>
  	</br>
	<div class="show">
   	  <table width="1000" border="0" cellspacing="0" cellpadding="0">
    	  <tr>
    	    <th width="45" height="40" align="left" bgcolor="#F5F5F5">#</th>
    	    <th width="165" align="left" bgcolor="#F5F5F5">วันที่จอง</th>
    	    <th width="165" align="left" bgcolor="#F5F5F5">เวลาจอง</th>
    	    <th width="165" align="left" bgcolor="#F5F5F5">สถานะ</th>
    	    <th width="165" align="left" bgcolor="#F5F5F5">จำนวนรายการจอง</th>
    	    <th width="165" align="left" bgcolor="#F5F5F5">รวมราคา</th>
    	    <th width="135" height="40" align="left" bgcolor="#F5F5F5">จองสินค้าบริการ</th>
   	    </tr>
        <?php
        include('../config.php');
		$sql_show	=	"select  count(dt.pro_id) as num_qty ,  sum(dt.det_price) as total_price , bk.book_id as new_id ,  bk.* , dt. *  from  books as bk  left join detail_books as dt  on bk.book_id  =  dt.book_id where  bk.book_status = 0 and  bk.member_user = '".$_SESSION['se_id']."' group by dt.book_id   order by  bk.book_status desc  limit 0,1 ";
		$result_show	=	mysql_query($sql_show);
		$line	=	0;
		while($show  =  mysql_fetch_assoc($result_show))
				{
					$line++;
		?>
    	  <tr>
    	    <td width="45" height="35" align="left"><?=$line;?></td>
    	    <td width="165" align="left"><?=date('d - m - Y' ,strtotime($show['book_date']));?></td>
    	    <td width="165" align="left"><?=$show['book_time'];?>  น.</td>
    	    <td width="165" align="left"><?php
            if($show['book_status']  ==  0)
			  {
				  echo "ยังไม่ได้ใช้บริการ";
			  }
			else
			  {
				   echo "ใช้บริการแล้ว";
			  }
			
			?></td>
    	    <td width="165" align="left"><?=$show['num_qty'];?></td>
    	    <td width="165" align="left"><?=$show['total_price'];?></td>
    	    <td width="135" height="35" align="center"><a href="list_add_book.php?link=uri_det&say_id=<?=$show['new_id'];?>"><img src="../img/Plus.png"  alt="" width="24" height="24"/></a></td>
   	    </tr>
        <?php
				}
		?>
        <tr>
    	    <td height="100" colspan="7" align="center" class="cl-orange"><h3>กรุณาจองเวลาก่อน</h3></td>
   	    </tr>
  	  </table>
  </div>
</div>

<?php
include('footer.php');
?>
</body>
</html>