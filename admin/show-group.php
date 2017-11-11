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
	<div class="page-header">
       	<h3 class="center"><span class="cl-green">แสดงข้อมูลสินค้า</span></h3>
   	</div>
  	</br>
	<div class="show">
   	  <table width="1000" border="0" cellspacing="0" cellpadding="0">
    	  <tr>
    	    <th width="30" height="40" align="left">#</th>
    	    <th width="850" height="40" align="left">ชื่อหมวดสินค้า</th>
    	    <th width="60" height="40" align="left">แก้ไข</th>
    	    <th width="60" height="40" align="left">ลบ</th>
  	    </tr>
        <?php
        include('../config.php');
		$sql_show	=	"select  *  from  groups  order by  group_name  asc";
		$result_show	=	mysql_query($sql_show);
		$line	=	0;
		while($show		=	mysql_fetch_assoc($result_show))
				{
					$line++;
		?>
    	  <tr>
    	    <td width="30" height="35" align="left"><?=$line;?></td>
    	    <td width="850" height="35" align="left"><?=$show['group_name'];?></td>
    	    <td width="60" height="35" align="left"><a href="edit-group.php?link=uri_group&say_id=<?=$show['group_id'];?>"><img src="../img/Write2.png" width="24" height="24"  alt=""/></a></td>
    	    <td width="60" height="35" align="left"><a href="del-group.php?link=uri_group&say_id=<?=$show['group_id'];?>" onClick="return confirm('คุณต้องการลบข้อมูลนี้');"><img src="../img/Trash.png" width="24" height="24"  alt=""/></a></td>
  	    </tr>
        <?php
				}
		?>
  	  </table>
  </div>
</div>

<?php
include('footer.php');
?>
</body>
</html>