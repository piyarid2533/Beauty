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
       	<h3 class="center"><span class="cl-green">แสดงข้อมูลจองเวลา</span></h3>
   	</div>
  	</br>
	<div class="show">
   	  <table width="1000" border="0" cellspacing="0" cellpadding="0">
    	  <tr>
    	    <th width="55" height="40" align="left" bgcolor="#F5F5F5">#</th>
    	    <th width="275" align="left" bgcolor="#F5F5F5">วันที่จอง</th>
    	    <th width="275" align="left" bgcolor="#F5F5F5">เวลาจอง</th>
    	    <th width="275" align="left" bgcolor="#F5F5F5">สถานะ</th>
    	    <th width="60" height="40" align="left" bgcolor="#F5F5F5">แก้ไข</th>
    	    <th width="60" height="40" align="left" bgcolor="#F5F5F5">ลบ</th>
  	    </tr>
        <?php
        include('../config.php');
		$sql_show	=	"select * from  books  where  book_status = 0 and  member_user = '".$_SESSION['se_id']."'  order by  book_status desc  limit 0,1 ";
		$result_show	=	mysql_query($sql_show);
		$line	=	0;
		while($show  =  mysql_fetch_assoc($result_show))
				{
					$line++;
		?>
    	  <tr>
    	    <td width="55" height="35" align="left"><?=$line;?></td>
    	    <td width="275" align="left"><?=date('d - m - Y' ,strtotime($show['book_date']));?></td>
    	    <td width="275" align="left"><?=$show['book_time'];?>  น.</td>
    	    <td width="275" align="left">
			<?php
            if($show['book_status']  ==  0)
			  {
				  echo "ยังไม่ได้ใช้บริการ";
			  }
			else
			  {
				   echo "ใช้บริการแล้ว";
			  }
			
			?>
            
            </td>
    	    <td width="60" height="35" align="left"><a href="edit-book.php?link=uri_book&say_id=<?=$show['book_id'];?>&say_date=<?=$show['book_date'];?>"><img src="../img/Write2.png" width="24" height="24"  alt=""/></a></td>
    	    <td width="60" height="35" align="left"><a href="del-book.php?link=uri_book&say_id=<?=$show['book_id'];?>" onClick="return confirm('คุณต้องการลบข้อมูลนี้');"><img src="../img/Trash.png" width="24" height="24"  alt=""/></a></td>
  	    </tr>
        <?php
				}
		?>
    	  <tr>
    	    <td height="100" colspan="6" align="center" class="cl-orange"><h3>กรุณาจองเวลาก่อน</h3></td>
   	    </tr>
       
  	  </table>
  </div>
</div>

<?php
include('footer.php');
?>
</body>
</html>